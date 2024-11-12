<?php
function run(string $url, array $routes): void {
    $uri = parse_url($url);
    $path = preg_replace('/^\/[^\/]+\/[^\/]+\/index\.php/', '', $uri["path"]);

    if (false === array_key_exists($path, $routes)) {
        return;
    }
    $callback = $routes[$path];
    $params = [];
    if (!empty($uri["query"])) {
        parse_str($uri["query"], $params);
    }
    $callback($params);
}
