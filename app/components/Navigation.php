<?php

namespace Components;

use	Nette\Application\Control,
	Models\Content;


class Navigation extends Control
{

	public function render()
	{
		$this->template->setFile(__DIR__ . '/navigation.phtml');
		$this->template->heads = Content::getHeads();
		$this->template->curentSlug = Content::getCurentSLug();
		$this->template->render();
	}

}