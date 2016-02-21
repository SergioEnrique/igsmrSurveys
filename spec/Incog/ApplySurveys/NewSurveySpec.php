<?php

namespace spec\Incog\ApplySurveys;

use Faker\Factory;
use Incog\ApplySurveys\SurveyRequest;
use Incog\ApplySurveys\SurveyResponse;
use Incog\ApplySurveys\NewSurveyListener;
use Incog\Surveys\AllOrganizations;
use Incog\Surveys\AllSurveys;
use Incog\Surveys\Organization;
use Incog\Surveys\Survey;
use Incog\Surveys\User;
use Incog\Uuid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewSurveySpec extends ObjectBehavior
{

    /** @type Generator */
    protected $faker;

    function let(AllSurveys $allSurveys, AllOrganizations $allOrganizations)
    {
        $this->faker = Factory::create();
        $this->beConstructedWith($allOrganizations, $allSurveys);
    }

    function it_should_notify_if_a_organization_cannot_be_found(
        NewSurveyListener $listener,
        AllOrganizations $allOrganizations,
        AllSurveys $allSurveys
    ){
        $request = new SurveyRequest(['organizationId' => $this->faker->uuid]);
        $allOrganizations->organizationOfId($request->organizationId)->willReturn(false);
        $this->attach($listener);

        $this->newSurvey($request);

        $listener->whenOrganizationNotFound($request)->shouldHaveBeenCalled();
    }

    function it_should_be_added_new_survey(
        NewSurveyListener $listener,
        AllOrganizations $allOrganizations,
        AllSurveys $allSurveys
    )
    {
        $organizationId = $this->faker->uuid;
        $userId = $this->faker->uuid;
        $surveyId = new Uuid($this->faker->uuid);
        $user = new User(
            new Uuid($userId),
            $this->faker->name,
            $this->faker->email
        );
        $organization = new Organization(
            new Uuid($organizationId),
            $this->faker->name,
            $user
        );
        $request = new SurveyRequest([
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'organizationId' => $this->faker->company
        ]);
        $allOrganizations->organizationOfId($request->organizationId)->willReturn($organization);
        $allSurveys->add(Argument::type(Survey::class))->shouldBeCalled();
        $allSurveys->nextIdentity()->willReturn($surveyId);
        $this->attach($listener);

        $this->newSurvey($request);

        $listener->whenSurveyIsAdded(Argument::type(SurveyResponse::class))->shouldHaveBeenCalled();
    }
}
