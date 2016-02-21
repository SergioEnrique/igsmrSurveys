<?php

namespace spec\Incog\ApplySurveys;

use Faker\Factory;
use Incog\ApplySurveys\InformationFieldRequest;
use Incog\ApplySurveys\InformationFieldResponse;
use Incog\ApplySurveys\NewInformationFieldListener;
use Incog\Surveys\AllInformationFields;
use Incog\Surveys\InformationField;
use Incog\Uuid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewInformationFieldSpec extends ObjectBehavior
{
    protected $faker;

    function let(AllInformationFields $allInformationFields)
    {
        $this->faker = Factory::create();
        $this->beConstructedWith($allInformationFields);
    }

    function it_should_be_added_new_information_field(
        NewInformationFieldListener $listener,
        AllInformationFields $allInformationFields
    )
    {
        $informationFieldId = new Uuid($this->faker->uuid);
        $request = new InformationFieldRequest([
            'name' => $this->faker->name
        ]);
        $allInformationFields->add(Argument::type(InformationField::class))->shouldBeCalled();
        $allInformationFields->nextIdentity()->willReturn($informationFieldId);
        $this->attach($listener);

        $this->newInformationField($request);

        $listener->whenInformationFieldIsAdded(Argument::type(InformationFieldResponse::class))->shouldHaveBeenCalled();
    }
}
