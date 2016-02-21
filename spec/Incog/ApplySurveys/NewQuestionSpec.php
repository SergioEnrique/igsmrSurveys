<?php

namespace spec\Incog\ApplySurveys;

use Faker\Factory;
use Incog\ApplySurveys\NewQuestionListener;
use Incog\ApplySurveys\QuestionRequest;
use Incog\ApplySurveys\QuestionResponse;
use Incog\Surveys\AllInformationFields;
use Incog\Surveys\AllQuestions;
use Incog\Surveys\AllSections;
use Incog\Surveys\InformationField;
use Incog\Surveys\Organization;
use Incog\Surveys\Question;
use Incog\Surveys\Section;
use Incog\Surveys\Survey;
use Incog\Surveys\User;
use Incog\Uuid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewQuestionSpec extends ObjectBehavior
{
    protected $faker;

    function let(
        AllInformationFields $allInformationFields, AllSections $allSections, AllQuestions $allQuestions
    )
    {
        $this->faker = Factory::create();
        $this->beConstructedWith($allInformationFields, $allSections, $allQuestions);
    }

    function it_should_notify_if_a_information_field_cannot_be_found(
        NewQuestionListener $listener,
        AllInformationFields $allInformationFields,
        AllSections $allSections,
        AllQuestions $allQuestions
    )
    {
        $request = new QuestionRequest(['informationFieldId' => $this->faker->uuid]);
        $allInformationFields->informationFieldOfId($request->informationFieldId)->willReturn(false);
        $this->attach($listener);

        $this->newQuestion($request);

        $listener->whenInformationFieldNotFound($request)->shouldHaveBeenCalled();
    }

    function it_should_notify_if_a_section_cannot_be_found(
        NewQuestionListener $listener,
        AllInformationFields $allInformationFields,
        AllSections $allSections,
        AllQuestions $allQuestions
    )
    {
        $informationFieldId = $this->faker->uuid;
        $informationField = new InformationField(
            new Uuid($informationFieldId),
            $this->faker->name
        );
        $request = new QuestionRequest([
            'informationFieldId' => $informationField,
            'sectionId' => $this->faker->uuid
        ]);
        $allInformationFields->informationFieldOfId($request->informationFieldId)->willReturn($informationField);
        $allSections->sectionOfId($request->sectionId)->willReturn(false);
        $this->attach($listener);

        $this->newQuestion($request);

        $listener->whenSectionNotFound($request)->shouldHaveBeenCalled();
    }

    function it_should_be_added_new_question(
        NewQuestionListener $listener,
        AllInformationFields $allInformationFields,
        AllSections $allSections,
        AllQuestions $allQuestions
    )
    {
        $informationFieldId = $this->faker->uuid;
        $organizationId = $this->faker->uuid;
        $userId = $this->faker->uuid;
        $surveyId = $this->faker->uuid;
        $sectionId = $this->faker->uuid;
        $questionId = new Uuid($this->faker->uuid);
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
        $section = new Section(
            new Uuid($sectionId),
            $this->faker->title,
            $survey
        );
        $informationField = new InformationField(
            new Uuid($informationFieldId),
            $this->faker->name
        );
        $request = new questionRequest([
            'title' => $this->faker->title,
            'weighing' => $this->faker->text,
            'informationFieldId' => $informationField,
            'sectionId' => $section
        ]);
        $allInformationFields->informationFieldOfId($request->informationFieldId)->willReturn($informationField);
        $allSections->sectionOfId($request->sectionId)->willReturn($section);
        $allQuestions->add(Argument::type(Question::class))->shouldBeCalled();
        $allQuestions->nextIdentity()->willReturn($questionId);
        $this->attach($listener);

        $this->newQuestion($request);

        $listener->whenQuestionIsAdded(Argument::type(QuestionResponse::class))->shouldHaveBeenCalled();

    }
}
