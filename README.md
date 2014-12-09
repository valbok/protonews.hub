protonews.hub
=============
Protonews.hub - is a prototype of news aggregator.

LOGICAL FLOW
------------
1. Spiders gather some news and place it into mongoDb server.
2. News hub reads the list of news items and shows them to users.

INTERESTED
-------
0. Implemented without any frameworks on pure php.
1. Abilities to fetch news items from different storage engines: [Articles](https://github.com/valbok/protonews.hub/blob/master/api/models/article)
2. An ability to combine few articles to one event and store on its own locations. [Events] (https://github.com/valbok/protonews.hub/tree/master/api/models/event)
3. Used Model-View-Presenter pattern to control actions from users.
4. Implemented simple template engine for views.
5. Respected to SOLID and dependency inversion principle in particular.
6. Object-relational mapping to read data from different database storages.
7. Examples how to fetch items via ajax.
