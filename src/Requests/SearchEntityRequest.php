<?php

namespace Sawirricardo\IcdApi\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sawirricardo\IcdApi\Connectors\IcdConnector;

class SearchEntityRequest extends SaloonRequest
{
    protected ?string $connector = IcdConnector::class;

    protected ?string $method = Saloon::GET;

    public function defaultQuery(): array
    {
        return [
            'q' => '',
            'subtreesFilter' => '',
            'chapterFilter' => '',
            'flatResults' => true,
            'useFlexisearch' => false,
            'releaseId' => '',
            'highlightingEnabled' => true,
        ];
    }

    public function defaultHeaders(): array
    {
        return [
            'API-Version' => 'v2',
            'Accept-Language' => 'en',
        ];
    }

    public function defineEndpoint(): string
    {
        return '/entity/search';
    }
}
