<?php

namespace Drupal\db_handler\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DbController.
 */
class DbController extends ControllerBase {

  /**
   * Drupal\Core\Database\Driver\mysql\Connection definition.
   *
   * @var \Drupal\Core\Database\Driver\mysql\Connection
   */
  protected $database;

  /**
   * Drupal\Core\Entity\EntityManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * Symfony\Component\DependencyInjection\ContainerAwareInterface definition.
   *
   * @var \Symfony\Component\DependencyInjection\ContainerAwareInterface
   */
  protected $entityQuery;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->database = $container->get('database');
    $instance->entityManager = $container->get('entity.manager');
    $instance->entityQuery = $container->get('entity.query');
    return $instance;
  }


  /**
   * Index.
   *
   * @return string
   *   Return db result string.
   */
  public function index($name) {
    // Query where do not need care about xss attack since condition method will take care of it.
    $query = $this->database->select('test', 't')->fields('t')->condition('id',$name,'=');

    $result = $query->execute()->fetchAll();

    return [
      '#type' => 'markup',
      '#markup' => $this->t($result[0]->id.'--'.$result[0]->langcode.'--'.$result[0]->description),
    ];
  }

}
