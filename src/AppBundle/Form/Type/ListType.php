<?php
// src/AppBundle/Form/Type/ListType.php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ListType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		// ...
		$builder->add('someTask', 'task');
	}
