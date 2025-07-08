<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace yii\di;

use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;
use ReflectionParameter;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * Container implements a [dependency injection](https://en.wikipedia.org/wiki/Dependency_injection) container.
 *
 * A dependency injection (DI) container is an object that knows how to instantiate and configure objects and
 * all their dependent objects. For more information about DI, please refer to
 * [Martin Fowler's article](https://martinfowler.com/articles/injection.html).
 *
 * Container supports constructor injection as well as property injection.
 *
 * To use Container, you first need to set up the class dependencies by calling [[set()]].
 * You then call [[get()]] to create a new class object. The Container will automatically instantiate
 * dependent objects, inject them into the object being created, configure, and finally return the newly created object.
 *
 * By default, [[\Yii::$container]] refers to a Container instance which is used by [[\Yii::createObject()]]
 * to create new object instances. You may use this method to replace the `new` operator
 * when creating a new object, which gives you the benefit of automatic dependency resolution and default
 * property configuration.
 *
 * Below is an example of using Container:
 *
 * ```php
 * namespace app\models;
 *
 * use yii\base\BaseObject;
 * use yii\db\Connection;
 * use yii\di\Container;
 *
 * interface UserFinderInterface
 * {
 *     function findUser();
 * }
 *
 * class UserFinder extends BaseObject implements UserFinderInterface
 * {
 *     public $db;
 *
 *     public function __construct(Connection $db, $config = [])
 *     {
 *         $this->db = $db;
 *         parent::__construct($config);
 *     }
 *
 *     public function findUser()
 *     {
 *     }
 * }
 *
 * class UserLister extends BaseObject
 * {
 *     public $finder;
 *
 *     public function __construct(UserFinderInterface $finder, $config = [])
 *     {
 *         $this->finder = $finder;
 *         parent::__construct($config);
 *     }
 * }
 *
 * $container = new Container;
 * $container->set('yii\db\Connection', [
 *     'dsn' => '...',
 * ]);
 * $container->set('app\models\UserFinderInterface', [
 *     'class' => 'app\models\UserFinder',
 * ]);
 * $container->set('userLister', 'app\models\UserLister');
 *
 * $lister = $container->get('userLister');
 *
 * // which is equivalent to:
 *
 * $db = new \yii\db\Connection(['dsn' => '...']);
 * $finder = new UserFinder($db);
 * $lister = new UserLister($finder);
 * ```
 *
 * For more details and usage information on Container, see the [guide article on di-containers](guide:concept-di-container).
 *
 * @property-read array $definitions The list of the object definitions or the loaded shared objects (type or
 * ID => definition or instance).
 * @property-write bool $resolveArrays Whether to attempt to resolve elements in array dependencies.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Container extends Component
{

}
