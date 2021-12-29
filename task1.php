## Найти и указать в проекте Front Controller и расписать классы, которые с ним взаимодействуют

Front Controller - это app/Kernel.php

Он взаимодействует со следующими классами

**use Framework\Registry;**
Для взаимодействия с файлами конфигов
**use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;**
Для загрузки содержимого файлов конфигов
**use Symfony\Component\DependencyInjection\ContainerBuilder;**
Для DI
**use Symfony\Component\Config\FileLocator;**
Для поиска файлов в указанной директории
**use Symfony\Component\HttpKernel\Controller\ControllerResolver;**
Для получения контроллера из строки запроса
**use Symfony\Component\HttpKernel\Controller\ArgumentResolver;**
Для получения аргументов из строки запроса
**use Symfony\Component\HttpFoundation\Request;**
Класс для работы с HTTP запросом
**use Symfony\Component\HttpFoundation\Response;**
Для генерации HTTP ответа
**use Symfony\Component\HttpFoundation\Session\Session;**
Для работы с сессией
**use Symfony\Component\Routing\Exception\ResourceNotFoundException;**
Класс исключения в случае ошибки парсинга запроса
**use Symfony\Component\Routing\Matcher\UrlMatcher;**
Видимо для проверки есть ли полученный url  в конфиге
**use Symfony\Component\Routing\RequestContext;**
Контекст для предыдущего класса
**use Symfony\Component\Routing\RouteCollection;**
Формирует коллекцию роутов из файла конфига