<?php
// namespace Tests\AppBundle\Game;

// use AppBundle\Form\Type\TestedType;
// use AppBundle\Model\TestObject;
// use Symfony\Component\Form\Test\TypeTestCase;
// use AppBundle\Contact\ContactRequest;
// use AppBundle\Contact\ContactRequestType;

// class ContactTest extends TestCase
// {
// 	public function testFormContact()
// 	{
// 		$formData = array(
//             'fullName' => 'name',
//             'emailAddress' => 'test@test.com',
//             'subject' => 'subject',
//             'message' => 'message',
//         );

//         $form = $this->factory->create(ContactRequestType::class);

//         $object = TestObject::fromArray($formData);

//         // submit the data to the form directly
//         $form->submit($formData);

//         $this->assertTrue($form->isSynchronized());
//         $this->assertEquals($object, $form->getData());

//         $view = $form->createView();
//         $children = $view->children;

//         foreach (array_keys($formData) as $key) {
//             $this->assertArrayHasKey($key, $children);
//         }
// 	}
// }