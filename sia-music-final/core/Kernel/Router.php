<?php
namespace MusicEngine\CoreSystem;
/**
 * Router
 *
 * PHP version 7.0
 */
class Router
{

    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     *
     * @param string $route  The route URL
     * @param array  $params Parameters (controller, action, etc.)
     *
     * @return void
     */
    public function add($route, $params = [])
    {
        // convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

  
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $url The route URL
     *
     * @return boolean  true if a match found, false otherwise
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }


    public function getParams()
    {
        return $this->params;
    }

    /**
     * dispatch the route, create the controller object and run the action method
     *
     * @param string $url The route URL
     *
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (preg_match('/action$/i', $action) == 0) {
                    $controller_object->$action();

                } else {
                    throw new \Exception("Method $action in controller $controller cannot be called directly - remove the Action suffix to call this method");
                }
            } else {
                throw new \Exception("Controller class $controller not found");
            }
        } else {
            throw new \Exception('No route matched.', 404);
        }
    }


    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string))); // ex : post-authors -> PostAuthors
    }


    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string)); //  ex : add-new -> addNew
    }

    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }


    /**
     * get the namespace for the controller class ( add it only if it's present in index.php that has routers)
     *
     * @return string The request URL
     */
    protected function getNamespace()
    {
        $namespace = 'MusicEngine\CoreSystem\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}