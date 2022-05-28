<?php

namespace Sawirricardo\IcdApi\RequestCollections;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\RequestCollection;
use Sawirricardo\IcdApi\Data\EntityCollectionData;
use Sawirricardo\IcdApi\Data\EntityData;
use Sawirricardo\IcdApi\Requests\ListEntitiesRequest;
use Sawirricardo\IcdApi\Requests\ViewEntityRequest;

class EntityRequestCollection extends RequestCollection
{
    public function all(): ?EntityCollectionData
    {
        $request = $this->connector->request(new ListEntitiesRequest());
        $response = $request->send();

        return $response->dto();
    }

    public function getEntity(string $id): ?EntityData
    {
        $request = $this->connector->request(new ViewEntityRequest($id));
        $response = $request->send();

        return $response->dto();
    }

    public function search(?string $query = null): ?Collection
    {
        $request = $this->connector->request(new ListEntitiesRequest($query));
        if (! empty($query)) {
            $request->mergeQuery(['q' => $query]);
        }
        $response = $request->send();

        return $response->collect();
    }
}
