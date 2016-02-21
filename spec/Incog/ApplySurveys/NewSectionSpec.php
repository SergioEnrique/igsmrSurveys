<?php

namespace spec\Incog\ApplySurveys;

use Faker\Factory;
use Incog\ApplySurveys\NewSectionListener;
use Incog\ApplySurveys\SectionRequest;
use Incog\ApplySurveys\SectionResponse;
use Incog\Surveys\AllSections;
use Incog\Surveys\AllSurveys;
use Incog\Surveys\Organization;
use Incog\Surveys\Section;
use Incog\Surveys\Survey;
use Incog\Surveys\User;
use Incog\Uuid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewSectionSpec extends ObjectBehavior
{
    protected $faker;

    function let(AllSurveys $allSurveys, AllSections $allSections)
    {
        $this->faker = Factory::create();
        $this->beConstructedWith($allSurveys, $allSections);
    }

    function it_should_notify_if_a_survey_cannot_be_found(
        NewSectionListener $listener,
        AllSurveys $allSurveys,
        AllSections $allSections
    )
    {
        $request = new SectionRequest(['surveyId' => $this->faker->uuid]);
        $allSurveys->surveyOfId($request->surveyId)->willReturn(false);
        $this->attach($listener);

        $this->newSection($request);

        $listener->whenSurveyNotFound($request)->shouldHaveBeenCalled();
    }

    function it_should_be_added_new_section(
        NewSectionListener $listener,
        AllSurveys $allSurveys,
        AllSections $allSections
    )
    {
        $organizationId = $this->faker->uuid;
        $userId = $this->faker->uuid;
        $surveyId = $this->faker->uuid;
        $sectionId = new Uuid($this->faker->uuid);
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
        $survey = new Survey(
            new Uuid($surveyId),
            $this->faker->title,
            $this->faker->text,
            $organization
        );
        $request = new SectionRequest([
            'title' => $this->faker->title,
            'surveyId' => $survey
        ]);
        $allSurveys->surveyOfId($request->surveyId)->willReturn($survey);
        $allSections->add(Argument::type(Section::class))->shouldBeCalled();
        $allSections->nextIdentity()->willReturn($sectionId);
        $this->attach($listener);

        $this->newSection($request);

        $listener->whenSectionIsAdded(Argument::type(SectionResponse::class))->shouldHaveBeenCalled();
    }
}
