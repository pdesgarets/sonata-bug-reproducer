<?php
namespace App\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EditUserTest extends WebTestCase
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }
    public function testEdit()
    {
        $crawler = $this->client->request('GET', '/admin/app/student/create');
        $buttonNode = $crawler->selectButton('Create');
        $form = $this->fillForm($buttonNode, $crawler);
        $this->client->submit($form);
        $this->assertResponseRedirects();

        $crawler = $this->client->request('GET', '/admin/app/student/1/edit');
        $buttonNode = $crawler->selectButton('Update');
        $form = $this->fillForm($buttonNode, $crawler);
        $this->client->submit($form);
        $this->assertResponseRedirects('/admin/app/student/1/edit');
    }

    private function fillForm($buttonNode, $crawler)
    {
        $extract = $crawler->filter('input[type="hidden"]')
            ->extract(array('id'))[0];
        $token = explode('__', $extract)[0];
        $field_id = $token . '[name]';
        $form = $buttonNode->form();
        $name = $form->get($field_id)->getValue();
        var_dump($name);
        $form->setValues([$field_id => ($name ?? '') . 'a']);
        return $form;
    }
}
