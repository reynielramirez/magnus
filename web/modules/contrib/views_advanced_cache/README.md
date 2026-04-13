# Views Advanced Cache

The views advanced cache module provides a cache plugin that allows more
precise manipulation of cache tags and cache contexts.

It is intended for advanced technical users with an understanding of the
Drupal 8 [Cache API](https://www.drupal.org/docs/8/api/cache-api/cache-api).

Misconfiguration can lead to incorrect or stale cache results including
bypassing of standard content access restrictions.


### Features

* A views cache plugin that allows adding and removing a view display's cache
  metadata such as contexts, tags and setting max-age.
* Additionally the cache metadata of each row can be modified.
* Cache tags can be excluded by exact match or regular expression.
* Dynamic cache tags based on argument token replacements.


## Requirements

This module requires the views module, which is included in Drupal core.


## Installation

Install as you would normally install a contributed Drupal module. For further
information, see
[Installing Drupal Modules](https://www.drupal.org/docs/extending-drupal/installing-drupal-modules).


## Configuration

This module exposes a cache plugin named _Advanced Caching_ on each view
display locate under *Advanced* -> *Other* -> *Caching* settings.

Settings to modify caching metadata applied to a view display are divided into
_Cache Tags_, _Cache Contexts_, and _Max-Age and Results Cache_. The cache tag
modifications can also be processed for each row.

Note that this module does not trigger the invalidation of the custom tags. See
below for example use cases, including one to add and invalidate a custom tag.


### Override the node_list cache tag

By default views adds a node_list cache tag to all node views and invalidates
cache entries with this tag whenever *ANY* node is created or updated. By
overriding the default `node_list` cache tag with a bundle-specific alternative
we can improve the cache HIT rate of views when unrelated content is saved.

The code below will invalidate the custom cache tag on node CRUD events.
```
/**
 * Invalidate a "my_custom:node_list:{bundle}" cache tag on node save.
 */
function my_custom_module_node_presave(NodeInterface $node) {
  $tags = ['my_custom:node_list:' . $node->getType()];
  Cache::invalidateTags($tags);
}
```

And the below cache tag settings will cache a view until page nodes are saved.

_Cache tags to add:_
```
my_custom:node_list:page
```

_Cache tags to exclude:_
```
node_list
```


### Excluding using regular expressions

A list of nodes will include a cache tag of `node:[nid]` for every node
included in the list. Invalidating any one of these cache tags, such as when
saving an included node, will invalidate all views it is included in. Normally
this would be a desired behavior, but if the goal is to cache a list of nodes
for as long as possible regardless of their content being updated, then these
specific tags can be removed using regular expression.

_Cache tags to add:_
```
my_custom:node_list:page
```

_Cache tags to exclude:_
```
node_list
```

_Cache tags to exclude via regular expression:_
```
/node\:[0-9]+/
```

In this configuration saving any of the nodes would _not_ trigger invalidation
of the view. The view would stay in cache until max-age, or manual cache flush.

By using the hook from the _Override the node_list cache tag_ example, the list
can still be invalidated using `my_custom:node_list:page`.

### Add / Remove cache contexts

Modifying cache contexts is a riskier proposition as incorrect configuration
may result in incorrect results and not just stale cached results. *USE WITH
CAUTION* A solid knowledge of the cache api
[cache contexts](https://www.drupal.org/docs/8/api/cache-api/cache-contexts)
and views cache configs is recommended.

This option allows altering of a view display plugin's cache_metadata contexts.
An example use is to limit the `url.query_args` in a rest_export view as below:

_Cache tags to add:_
```
url.query_args:page
url.query_args:items_per_page
url.query_args:offset
url.query_args:my_custom_filter
```

_Cache tags to exclude:_
```
- url.query_args
```

This can be used to override the default pager caching per all page query
arguments instead only considering those relevant to the view.


## Related Modules

* [Views Custom Cache Tags](https://www.drupal.org/project/views_custom_cache_tag)


## Maintainers

* [Malcolm Poindexter (malcolm_p)](https://www.drupal.org/u/malcolm_p)
* [Ted Cooper (elc)](https://www.drupal.org/u/elc)
