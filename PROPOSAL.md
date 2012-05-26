# Ottawa Dog Park Finder

Ottawa Dog Park Finder is a small, fun application for residents to find parks nearest them that allow dogs.
A mobile and desktop web application that uses the Ottawa Open Data dog park information.

- [Ottawa Open Data](http://ottawa.ca/opendata/)

### Features

- Display all the dog parks in the city on a map.
- Coloured badges to distinguish park differences.
- Detailed information for each park including, address, rules, etc.
- Filtering parks by popularity, friendliness, and cleanliness.
- Ability to rate parks based on facilities, other dogs & people, and poopiness.
- Use geolocation or search an address to find parks nearby.

## Learning goals

- To explore building an application with an open dataset.
- Learn more about the Python programming language.
- Understand and deploy an application with Google App Engine.
- Explore and apply mobile first techniques and responsive web design.

This app will help with my goals because it will put me in the thick of it and force me to apply the techniques and technologies directly on a live, functional application.

### Technologies & techniques

- Mobile first and responsive web design.
- Google Maps integration.
- Python on Google App Engine, with Big Table.
- Geolocation and geocoding.
- Offline and AppCache.

## Similar applications

- [Dog Park Locator](http://www.dogchannel.com/dog-park/parklocator.aspx)

	Dog Park Locator uses a map of the US as its primary interface and centres around US locations.
	Though you can select Canadian provinces—but with no results.
	The interactivity is pretty minimal, by clicking a state you get a list below with some details.
	
	**Differences**
	
	My app will be more interactive with Google Maps and users can more easily search their location.
	The scope of my dog park finder is limited to local Ottawa.
	Users will also be able to rate and sort parks.

- [Dog Park Finder Plus](http://itunes.apple.com/ca/app/dog-park-finder-plus/id372419544?mt=8)
	
	Dog Park Finder Plus is an iOS application that appears to work across the US and Canada.
	The feature list is pretty extensive including reviews, maps, hiking trails, photos, etc.
	
	**Differences**
	
	This application lacks focus; it has too many features.
	But it does contain many of the features I’m interested in incorporating.
	The major differences with my app are the location and platform requirements.
	Dog Park Finder Plus only works for iPhone owners, where my web app will be cross-platform.

- [Vancouver Dog Board](http://vancouver.ca/parks/info/dogparks/)
	
	The Vancouver Dog Board is the city’s official dog park listing.
	The main feature is a map with hover balloons and a long list of parks.
	
	**Differences**
	
	My application will be more usable and interactive, including Google Maps.
	The Vancouver Dog Board doesn’t include the searching or rating features I’m interested in.

## User research

Dog Park Finder is primarily targeted at people who live in the city and own one or more dogs.

Most people know where their neighbourhood park is, so the app is for people looking for other parks or people who are new to the city.
The rating feature allows users to find other interesting and relevant parks.

### Liz

![Liz](http://elizabethandjane.ca/eaj-wp/eaj-content/themes/elizabethandjane/images/liz-headshot.jpg)

Liz is a 29 year old, self-starter who owns her own photography business—and three small dogs.

- Favourite movie: Robin Hood, Men in Tights
- Loves pop music
- Does a little Yoga and wears as much LuLu Lemon as possible
- She’s a nerd; has a smart phone and uses it regularly
- Adores dogs and is active in the dog community
- She home-cooks her dogs’ food so they can be the healthiest possible

#### Motivations

- Liz is friendly and honest and looks for the same in other people
- She loves meeting new people and being social
- Her dogs can be very energetic and need some social stimulus

#### Demotivations

- Liz actively dislikes people who don’t give a crap
- Cattiness and dishonesty “gurgle her murgle” (in her words)
- Dirty parks and grumpy dog owners