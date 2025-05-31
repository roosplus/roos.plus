public function requirements()
{
    $requirements = [];

    $requirements['requirements'] = [
        'php' => [
            'version' => PHP_VERSION,
            'status' => version_compare(PHP_VERSION, '8.0.0', '>=')
        ],
        'extensions' => [
            'openssl' => extension_loaded('openssl'),
            'pdo' => extension_loaded('pdo'),
            'mbstring' => extension_loaded('mbstring'),
            'tokenizer' => extension_loaded('tokenizer'),
            'xml' => extension_loaded('xml'),
            'ctype' => extension_loaded('ctype'),
            'json' => extension_loaded('json'),
            'fileinfo' => extension_loaded('fileinfo'),
            'curl' => extension_loaded('curl'),
        ],
    ];

    return view('install.requirements', compact('requirements'));
}
