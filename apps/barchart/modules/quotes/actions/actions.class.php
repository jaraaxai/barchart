<?php

class quotesActions extends sfActions
{
  public function executeSearch(sfWebRequest $request)
  {
    $keyword = $request->getParameter('keyword');
    if( $keyword ){
      $this->quotes = Doctrine::getTable('Quotes')->getSymbolByKey($keyword);

      if( $this->quotes ){
        $this->getUser()->setFlash('warning', 'This symbol has already been added to the watchlist');
        $this->redirect('quotes/edit?id='.$this->quotes->getId());
      } else {
        $this->getUser()->setFlash('info', 'The given symbol does not exist');
        $this->redirect('quotes/new?keyword='.$keyword);
      }
    } else {
      $this->getUser()->setFlash('error', 'Insert symbol name!');
      $this->redirect('quotes/index');
    }
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->quotess = Doctrine::getTable('Quotes')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $keyword = $request->getParameter('keyword');
    $this->form = new QuotesForm();
    $this->form->setDefault('symbol', $keyword);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new QuotesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');

  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($quotes = Doctrine::getTable('Quotes')->find(array($request->getParameter('id'))), sprintf('Object quotes does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuotesForm($quotes);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($quotes = Doctrine::getTable('Quotes')->find(array($request->getParameter('id'))), sprintf('Object quotes does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuotesForm($quotes);

    //$this->form = new QuotesForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {

    $this->forward404Unless($quotes = Doctrine::getTable('Quotes')->find(array($request->getParameter('id'))), sprintf('Object quotes does not exist (%s).', $request->getParameter('id')));
    $quotes->delete();

    return $this->renderText('success');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $quotes = $form->save();
      $this->getUser()->setFlash('success', 'Save successful');
      $this->redirect('quotes/index');
    }
  }
}
