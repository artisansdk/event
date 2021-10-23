<?php

namespace ArtisanSdk\Event\Models;

use ArtisanSdk\Event\Stream\Stream;
use ArtisanSdk\Event\Stream\Event;
use ArtisanSdk\Event\Stream\Snapshot;

abstract class Aggregate extends Entity
{
    /**
     * Make a new aggregate with generated key.
     *
     * @return \ArtisanSdk\Event\Models\Aggregate
     */
    abstract public static function make() : Aggregate;

    /**
     * Load an existing aggregate by key with events from the stream.
     *
     * @example $aggregate = Aggregate::load(1);       // load all events, ignoring snapshots
     *          $aggregate = Aggregate::load(1, true); // load all events from last snapshot
     *          $aggregate = Aggregate::load(1, 3);    // load all events from a specific snapshot
     *
     * @param string $key of the aggregate
     * @param bool|string $snapshot to load events from
     *
     * @return \ArtisanSdk\Event\Models\Aggregate
     */
    abstract public static function load(string $key, $snapshot = false) : Aggregate;

    /**
     * Set the aggregate state to the stream of events.
     *
     * @param  \ArtisanSdk\Event\Stream\Stream $events
     *
     * @return \ArtisanSdk\Event\Models\Aggregate
     */
    abstract public function state(Stream $events) : Aggregate;

    /**
     * Get fresh events from the event store for the aggregate.
     *
     * @return \ArtisanSdk\Event\Models\Aggregate
     */
    abstract public function fresh() : Aggregate;

    /**
     * Get the current built state of the underlying model.
     *
     * @throws \ArtisanSdk\Event\Exceptions\Violation
     *
     * @return \ArtisanSdk\Event\Models\Model
     */
    abstract public function current() : Model;

    /**
     * Get the last event key to be used as the version for the aggregate.
     *
     * @return string
     */
    abstract public function version() : string;

    /**
     * Get all the committed events making up the aggregate.
     *
     * @return \ArtisanSdk\Event\Stream\Stream
     */
    abstract public function events() : Stream;

    /**
     * Get all the uncommitted events making up the aggregate.
     *
     * @return \ArtisanSdk\Event\Stream\Stream
     */
    abstract public function changes() : Stream;

    /**
     * The aggregate has changes as uncommitted events.
     *
     * @return bool
     */
    abstract public function dirty() : bool;

    /**
     * Move changes (uncommitted events) to the committed events.
     *
     * @example $commits = $aggregate->commit();        // commit all changes tracked
     *          $commits = $aggregate->commit($stream); // commit only the changes found in the stream
     *
     * @param  \ArtisanSdk\Event\Stream\Stream|null $events to be committed
     *
     * @return \ArtisanSdk\Event\Stream\Stream of events committed
     */
    abstract public function commit(Stream $events = null) : Stream;

    /**
     * Remove uncommitted events from the changes tracked.
     *
     * @example $aggregate->rollback();        // remove all changes tracked
     *          $aggregate->rollback($stream); // remove only the changes found in the stream
     *
     * @param  \ArtisanSdk\Event\Stream\Stream|null $events to be rolledback
     *
     * @return \ArtisanSdk\Event\Stream\Stream of events rolledback
     */
    abstract public function rollback(Stream $events = null) : Stream;

    /**
     * Push another uncommitted event onto the aggregate as a tracked change.
     *
     * @example $aggregate->push($event);  // push a single event onto the aggregate
     *          $aggregate->push($stream); // push a stream of one or more events onto the aggregate
     *
     * @param  \ArtisanSdk\Event\Stream\Event|\ArtisanSdk\Event\Stream\Stream $event or stream to add to the aggregate
     *
     * @return \ArtisanSdk\Event\Models\Aggregate
     */
    abstract public function push(Event|Stream $event) : Aggregate;

    /**
     * Generate a snapshot of the current model.
     *
     * @return \ArtisanSdk\Event\Stream\Snapshot
     */
    abstract public function snapshot() : Snapshot;

    /**
     * Save the changes (uncommitted events) to the event store.
     *
     * @throws \ArtisanSdk\Event\Exceptions\Conflict
     *
     * @return \ArtisanSdk\Event\Models\Aggregate
     */
    abstract public function save() : Aggregate;
}
