---
layout:     post
title:      So you got Parsed?
date:       2016-02-02 2:23:00
summary:    Exploring Parse server implementations and alternative mBaaS providers
categories: iOS Parse Docker
---
***

On January 28 Parse announced the end of their popular BaaS(backend as a service). This forces developers to find an alternative solution for push notifications, data storage, user verification, etc. Luckily Parse is providing a path to running your own Parse-compatible service. However, Parse offered some services not supported in the open source project so choosing whether to use another Baas or to configure the backend manually can be difficult. The best solution depends mainly on the complexity, scale, and services used in your application. [This](https://github.com/relatedcode/ParseAlternatives) should help get you started.




## Using a Parse Server (High Complexity)
Parse provided a [well documented path](https://parse.com/docs/server/guide) to help developers migrate to a self hosted Node.js service. If you prefer not to do any backend management at all and would rather rewrite your application using another provided SDK, skip to the next section.

#### DIY [Parse Server](https://github.com/ParsePlatform/parse-server):

* Configurable services that host Node.js applications:
	* [IBM Bluemix](https://console.ng.bluemix.net/): works well with MongoHQ
	* [Google App Engine](https://cloud.google.com/nodejs/): works well with MongoLab

* MongoDB manage hosting management platforms:
	* [MongoLab](https://mongolab.com)
	* [MongoHQ](https://www.compose.io/mongodb/)
	* [ObjectRocket](http://objectrocket.com/mongodb/)

* Integrated Tutorials
	* [IDM Bluemix & MongoHQ](https://console.ng.bluemix.net/)
	* [Google App Engine & MongoLab](https://medium.com/google-cloud/deploying-parse-server-to-google-app-engine-6bc0b7451d50)


#### Parse & Containerization:
Another (and more complex) route would be to use containerization. This option is is optimal for apps with scale.

* [Instainer](http://beta.instainer.com/): easiest containerization option to test concept
	* [Instainer Implementation](https://hub.docker.com/r/instainer/parse-server/)
* [Docker Swarm](https://www.docker.com/products/docker-swarm): containerization deployment	 
* [Kubernetes](http://kubernetes.io/): container cluster management
* [Kontena](http://www.kontena.io/): container platform / container cluster management
	* [Kontena Parse Tutorial](http://blog.kontena.io/how-to-install-and-run-private-parse-server-in-production/)



## Use Another Baas (Low Complexity)
This option requires rewriting all of the Parse SDK logic in your application. It definitely will be less time consuming than developing a full stack but will also be less rewarding. Depending on the scale of your application, it may be the best option if you prefer not to manage any backend development. Here are some of the top providers I found:

* [Fabric](https://get.fabric.io/): twitter's framework
* [DeepStream](http://deepstream.io/): similar to Parse
* [Kinto](http://kinto.readthedocs.org/en/latest/): lightweight json storage services
* [Firebase](https://www.firebase.com/): backed by Google
* [Couchbase Mobile](http://www.couchbase.com/)
* [Kinvey](http://www.kinvey.com/)
