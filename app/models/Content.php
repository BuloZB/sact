<?php

namespace Models;

use	Dibi;


class Content
{

	private static $curentSlug = null;


	public static function getHeads()
	{
		$result = dibi::select('headline, slug')
			->from('content')
			->fetchAll();

		return $result;
    }


	public static function getFirstArticle()
	{
		$result = dibi::select('*')
			->from('content')
			->limit(1)
			->execute()
			->fetch();

		self::$curentSlug = $result->slug;

		return $result;
    }


	public static function getArticle($slug)
	{
		$result = dibi::select('*')
			->from('content')
			->where('slug=%s', $slug)
			->fetch();

		return $result;
    }



  /* ******************************** *
   *     tooling (getters/seters)     *
   * ******************************** */

	public static function getCurentSLug()
	{
		return self::$curentSlug;
	}


	public static function setCurentSlug($slug)
	{
		self::$curentSlug = $slug;
	}

}
