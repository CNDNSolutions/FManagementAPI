<?php

namespace App\Entries\Collections;

use Illuminate\Support\Collection;


/**
 * @template TKey of array-key
 * 
 * @implements Collection<TKey, \App\Entries\Models\Entry>
 */
final class EntriesCollection extends Collection
{
}
