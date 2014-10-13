<?php namespace Main;

use HuntQuote\Repositories\Author;

class AuthorController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Author $author)
	{
		$this->author = $author;
	}

	/**
	 * Shows a listing of the resource
	 * 
	 * @return Response
	 */
	public function index()
	{
		$authors = $this->author->groupedAlphabetically();

		return \View::make('main.authors.index')
			->with('authors', $authors);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($id)
	{
		$author = $this->author->find($id);

		return \View::make('main.authors.show')
			->with('author', $author);
	}

	/**
	 * [alpha description]
	 * @param  [type] $character [description]
	 * @return [type]            [description]
	 */
	public function alpha($character)
	{
		$character = strtolower($character);
		$authors = $this->author->getByCharacterPaginated($character);

		return \View::make('main.authors.alpha')
			->with('authors', $authors)
			->with('character', $character);
	}

}