<?php
/**
 * Copyright 2011 Bas de Nooijer. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this listof conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are
 * those of the authors and should not be interpreted as representing official
 * policies, either expressed or implied, of the copyright holder.
 *
 * @copyright Copyright 2011 Bas de Nooijer <solarium@raspberry.nl>
 * @license http://github.com/basdenooijer/solarium/raw/master/COPYING
 *
 * @link http://www.solarium-project.org/
 */

/**
 * @namespace
 */

namespace Solarium\QueryType\Select\Query\Component;

use Solarium\Exception\InvalidArgumentException;
use Solarium\QueryType\Select\Query\Query as SelectQuery;
use Solarium\QueryType\Select\RequestBuilder\Component\DisMax as RequestBuilder;

/**
 * DisMax component.
 *
 * @link http://wiki.apache.org/solr/DisMaxQParserPlugin
 */
class DisMax extends AbstractComponent
{
    /**
     * Default options.
     *
     * @var array
     */
    protected $options = array(
        'queryparser' => 'dismax',
    );

    /**
     * Boostqueries.
     *
     * @var BoostQuery[]
     */
    protected $boostQueries = array();

    /**
     * Get component type.
     *
     * @return string
     */
    public function getType()
    {
        return SelectQuery::COMPONENT_DISMAX;
    }

    /**
     * Get a requestbuilder for this query.
     *
     * @return RequestBuilder
     */
    public function getRequestBuilder()
    {
        return new RequestBuilder();
    }

    /**
     * This component has no response parser...
     */
    public function getResponseParser()
    {
    }

    /**
     * Set QueryAlternative option.
     *
     * If specified, this query will be used (and parsed by default using
     * standard query parsing syntax) when the main query string is not
     * specified or blank.
     *
     * @param string $queryAlternative
     *
     * @return self Provides fluent interface
     */
    public function setQueryAlternative($queryAlternative)
    {
        return $this->setOption('queryalternative', $queryAlternative);
    }

    /**
     * Get QueryAlternative option.
     *
     * @return string|null
     */
    public function getQueryAlternative()
    {
        return $this->getOption('queryalternative');
    }

    /**
     * Set QueryFields option.
     *
     * List of fields and the "boosts" to associate with each of them when
     * building DisjunctionMaxQueries from the user's query.
     *
     * The format supported is "fieldOne^2.3 fieldTwo fieldThree^0.4"
     *
     * @param string $queryFields
     *
     * @return self Provides fluent interface
     */
    public function setQueryFields($queryFields)
    {
        return $this->setOption('queryfields', $queryFields);
    }

    /**
     * Get QueryFields option.
     *
     * @return string|null
     */
    public function getQueryFields()
    {
        return $this->getOption('queryfields');
    }

    /**
     * Set MinimumMatch option.
     *
     * This option makes it possible to say that a certain minimum number of
     * clauses must match. See Solr manual for details.
     *
     * @param string $minimumMatch
     *
     * @return self Provides fluent interface
     */
    public function setMinimumMatch($minimumMatch)
    {
        return $this->setOption('minimummatch', $minimumMatch);
    }

    /**
     * Get MinimumMatch option.
     *
     * @return string|null
     */
    public function getMinimumMatch()
    {
        return $this->getOption('minimummatch');
    }

    /**
     * Set PhraseFields option.
     *
     * This param can be used to "boost" the score of documents in cases
     * where all of the terms in the "q" param appear in close proximity.
     *
     * Format is: "fieldA^1.0 fieldB^2.2"
     *
     * @param string $phraseFields
     *
     * @return self Provides fluent interface
     */
    public function setPhraseFields($phraseFields)
    {
        return $this->setOption('phrasefields', $phraseFields);
    }

    /**
     * Get PhraseFields option.
     *
     * @return string|null
     */
    public function getPhraseFields()
    {
        return $this->getOption('phrasefields');
    }

    /**
     * Set PhraseSlop option.
     *
     * Amount of slop on phrase queries built for "pf" fields
     * (affects boosting)
     *
     * @param string $phraseSlop
     *
     * @return self Provides fluent interface
     */
    public function setPhraseSlop($phraseSlop)
    {
        return $this->setOption('phraseslop', $phraseSlop);
    }

    /**
     * Get PhraseSlop option.
     *
     * @return string|null
     */
    public function getPhraseSlop()
    {
        return $this->getOption('phraseslop');
    }

    /**
     * Set QueryPhraseSlop option.
     *
     * Amount of slop on phrase queries explicitly included in the user's
     * query string (in qf fields; affects matching)
     *
     * @param string $queryPhraseSlop
     *
     * @return self Provides fluent interface
     */
    public function setQueryPhraseSlop($queryPhraseSlop)
    {
        return $this->setOption('queryphraseslop', $queryPhraseSlop);
    }

    /**
     * Get QueryPhraseSlop option.
     *
     * @return string|null
     */
    public function getQueryPhraseSlop()
    {
        return $this->getOption('queryphraseslop');
    }

    /**
     * Set Tie option.
     *
     * Float value to use as tiebreaker in DisjunctionMaxQueries
     *
     * @param float $tie
     *
     * @return self Provides fluent interface
     */
    public function setTie($tie)
    {
        return $this->setOption('tie', $tie);
    }

    /**
     * Get Tie option.
     *
     * @return float|null
     */
    public function getTie()
    {
        return $this->getOption('tie');
    }

    /**
     * Set BoostQuery option.
     *
     * A raw query string (in the SolrQuerySyntax) that will be included
     * with the user's query to influence the score.
     *
     * @param string $boostQuery
     *
     * @return self Provides fluent interface
     */
    public function setBoostQuery($boostQuery)
    {
        $this->clearBoostQueries();
        $this->addBoostQuery(array('key' => 0, 'query' => $boostQuery));

        return $this;
    }

    /**
     * Get BoostQuery option.
     *
     * @param string $key
     *
     * @return string|null
     */
    public function getBoostQuery($key = null)
    {
        if ($key !== null) {
            if (array_key_exists($key, $this->boostQueries)) {
                return $this->boostQueries[$key]->getQuery();
            }
        } else if (!empty($this->boostQueries)) {
            /** @var BoostQuery[] $boostQueries */
            $boostQueries = array_values($this->boostQueries);

            return $boostQueries[0]->getQuery();
        } else if (array_key_exists('boostquery', $this->options)) {
            return $this->options['boostquery'];
        }

        return null;
    }

    /**
     * Add a boost query.
     *
     * Supports a boostquery instance or a config array, in that case a new
     * boostquery instance wil be created based on the options.
     *
     * @throws InvalidArgumentException
     *
     * @param BoostQuery|array $boostQuery
     *
     * @return self Provides fluent interface
     */
    public function addBoostQuery($boostQuery)
    {
        if (is_array($boostQuery)) {
            $boostQuery = new BoostQuery($boostQuery);
        }

        $key = $boostQuery->getKey();

        if (0 === strlen($key)) {
            throw new InvalidArgumentException('A boostquery must have a key value');
        }

        //double add calls for the same BQ are ignored, but non-unique keys cause an exception
        if (array_key_exists($key, $this->boostQueries) && $this->boostQueries[$key] !== $boostQuery) {
            throw new InvalidArgumentException('A boostquery must have a unique key value within a query');
        } else {
            $this->boostQueries[$key] = $boostQuery;
        }

        return $this;
    }

    /**
     * Add multiple boostqueries.
     *
     * @param array $boostQueries
     *
     * @return self Provides fluent interface
     */
    public function addBoostQueries(array $boostQueries)
    {
        foreach ($boostQueries as $key => $boostQuery) {
            // in case of a config array: add key to config
            if (is_array($boostQuery) && !isset($boostQuery['key'])) {
                $boostQuery['key'] = $key;
            }

            $this->addBoostQuery($boostQuery);
        }

        return $this;
    }

    /**
     * Get all boostqueries.
     *
     * @return BoostQuery[]
     */
    public function getBoostQueries()
    {
        return $this->boostQueries;
    }

    /**
     * Remove a single boostquery.
     *
     * You can remove a boostquery by passing its key, or by passing the boostquery instance
     *
     * @param string|BoostQuery $boostQuery
     *
     * @return self Provides fluent interface
     */
    public function removeBoostQuery($boostQuery)
    {
        if (is_object($boostQuery)) {
            $boostQuery = $boostQuery->getKey();
        }

        if (isset($this->boostQueries[$boostQuery])) {
            unset($this->boostQueries[$boostQuery]);
        }

        return $this;
    }

    /**
     * Remove all boostqueries.
     *
     * @return self Provides fluent interface
     */
    public function clearBoostQueries()
    {
        $this->boostQueries = array();

        return $this;
    }

    /**
     * Set multiple boostqueries.
     *
     * This overwrites any existing boostqueries
     *
     * @param array $boostQueries
     */
    public function setBoostQueries($boostQueries)
    {
        $this->clearBoostQueries();
        $this->addBoostQueries($boostQueries);
    }

    /**
     * Set BoostFunctions option.
     *
     * Functions (with optional boosts) that will be included in the
     * user's query to influence the score.
     *
     * Format is: "funcA(arg1,arg2)^1.2 funcB(arg3,arg4)^2.2"
     *
     * @param string $boostFunctions
     *
     * @return self Provides fluent interface
     */
    public function setBoostFunctions($boostFunctions)
    {
        return $this->setOption('boostfunctions', $boostFunctions);
    }

    /**
     * Get BoostFunctions option.
     *
     * @return string|null
     */
    public function getBoostFunctions()
    {
        return $this->getOption('boostfunctions');
    }

    /**
     * Set QueryParser option.
     *
     * Can be used to enable edismax
     *
     * @since 2.1.0
     *
     * @param string $parser
     *
     * @return self Provides fluent interface
     */
    public function setQueryParser($parser)
    {
        return $this->setOption('queryparser', $parser);
    }

    /**
     * Get QueryParser option.
     *
     * @since 2.1.0
     *
     * @return string
     */
    public function getQueryParser()
    {
        return $this->getOption('queryparser');
    }
}
