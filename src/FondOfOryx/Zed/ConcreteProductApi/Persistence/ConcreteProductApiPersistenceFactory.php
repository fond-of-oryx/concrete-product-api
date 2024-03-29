<?php

namespace FondOfOryx\Zed\ConcreteProductApi\Persistence;

use FondOfOryx\Zed\ConcreteProductApi\ConcreteProductApiDependencyProvider;
use FondOfOryx\Zed\ConcreteProductApi\Dependency\Facade\ConcreteProductApiToApiFacadeInterface;
use FondOfOryx\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryBuilderQueryContainerInterface;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfOryx\Zed\ConcreteProductApi\ConcreteProductApiConfig getConfig()
 */
class ConcreteProductApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Product\Persistence\SpyProductQuery
     */
    public function getProductQuery(): SpyProductQuery
    {
        return $this->getProvidedDependency(ConcreteProductApiDependencyProvider::PROPEL_QUERY_PRODUCT);
    }

    /**
     * @return \FondOfOryx\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryBuilderQueryContainerInterface
     */
    public function getApiQueryBuilderQueryContainer(): ConcreteProductApiToApiQueryBuilderQueryContainerInterface
    {
        return $this->getProvidedDependency(ConcreteProductApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER);
    }

    /**
     * @return \FondOfOryx\Zed\ConcreteProductApi\Dependency\Facade\ConcreteProductApiToApiFacadeInterface
     */
    public function getApiFacade(): ConcreteProductApiToApiFacadeInterface
    {
        return $this->getProvidedDependency(ConcreteProductApiDependencyProvider::FACADE_API);
    }
}
