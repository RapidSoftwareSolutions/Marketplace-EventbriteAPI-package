# EventbriteAPI Package
The Eventbrite API is the best way to integrate and extend Eventbrite for your event or organising needs.
* Domain: eventbrite.com
* Credentials: token

## How to get credentials: 
0. Sign up or log in to [EventBrite](https://www.eventbrite.com/login/)
1. Go to [App Management](https://www.eventbrite.com/myaccount/apps/)
2. Create a new app.
3. After creation new app you will see the link **Show Client Secret and OAuth Token**. Click on it for show your OAuth token.

## TOC: 
* [getCategories](#getCategories)
* [getSingleCategory](#getSingleCategory)
* [getSubcategories](#getSubcategories)
* [getSingleSubcategory](#getSingleSubcategory)
* [getFormats](#getFormats)
* [getSingleFormat](#getSingleFormat)
* [getMedia](#getMedia)
* [uploadMedia](#uploadMedia)
* [getTimezones](#getTimezones)
* [getRegions](#getRegions)
* [getCountries](#getCountries)
* [createOrganizer](#createOrganizer)
* [updateOrganizer](#updateOrganizer)
* [getOrganizer](#getOrganizer)
* [getOrganizerEvents](#getOrganizerEvents)
* [getVenue](#getVenue)
* [updateVenue](#updateVenue)
* [createVenue](#createVenue)
* [getVenueEvents](#getVenueEvents)
* [getSingleWebhook](#getSingleWebhook)
* [createWebhook](#createWebhook)
* [getWebhooks](#getWebhooks)
* [deleteWebhook](#deleteWebhook)
* [getUser](#getUser)
* [getUserOrders](#getUserOrders)
* [getUserVenues](#getUserVenues)
* [getUserOrganizers](#getUserOrganizers)
* [getUserOwnedEvents](#getUserOwnedEvents)
* [getUserEvents](#getUserEvents)
* [getUserOwnedEventAttendees](#getUserOwnedEventAttendees)
* [getUserOwnedEventOrders](#getUserOwnedEventOrders)
* [getUserContactLists](#getUserContactLists)
* [createUserContactList](#createUserContactList)
* [updateContactList](#updateContactList)
* [deleteUserContactList](#deleteUserContactList)
* [getContactListContacts](#getContactListContacts)
* [addContactToContactList](#addContactToContactList)
* [deleteContactFromContactList](#deleteContactFromContactList)
* [getUserBookmarks](#getUserBookmarks)
* [createBookmark](#createBookmark)
* [deleteBookmark](#deleteBookmark)
* [createEventSeries](#createEventSeries)
* [getEventSerie](#getEventSerie)
* [changeEventSerie](#changeEventSerie)
* [publishEventSerie](#publishEventSerie)
* [unpublishEventSerie](#unpublishEventSerie)
* [cancelEventSerie](#cancelEventSerie)
* [deleteEventSerie](#deleteEventSerie)
* [getSignleEventFromSerieEvents](#getSignleEventFromSerieEvents)
* [addSingleEventInSerieEvents](#addSingleEventInSerieEvents)
* [deleteSingleEventInSerieEvents](#deleteSingleEventInSerieEvents)
* [searchEvent](#searchEvent)
* [createEvent](#createEvent)
* [getEventById](#getEventById)
* [updateEvent](#updateEvent)
* [publishEvent](#publishEvent)
* [unpublishEvent](#unpublishEvent)
* [cancelEvent](#cancelEvent)
* [deleteEvent](#deleteEvent)
* [getEventDisplaySettings](#getEventDisplaySettings)
* [updateEventDisplaySettings](#updateEventDisplaySettings)
* [getEventTicketClasses](#getEventTicketClasses)
* [createEventTicketClass](#createEventTicketClass)
* [getEventTicketClass](#getEventTicketClass)
* [updateEventTicketClass](#updateEventTicketClass)
* [deleteEventTicketClass](#deleteEventTicketClass)
* [addEventQuestion](#addEventQuestion)
* [getEventAttendees](#getEventAttendees)
* [getEventOrders](#getEventOrders)
* [getEventDiscounts](#getEventDiscounts)
* [createEventDiscount](#createEventDiscount)
* [getEventDiscount](#getEventDiscount)
* [updateEventDiscount](#updateEventDiscount)
* [getEventPublicDiscounts](#getEventPublicDiscounts)
* [createEventPublicDiscount](#createEventPublicDiscount)
* [getEventPublicDiscount](#getEventPublicDiscount)
* [updateEventPublicDiscount](#updateEventPublicDiscount)
* [deleteEventPublicDiscount](#deleteEventPublicDiscount)
* [getEventAccessCodes](#getEventAccessCodes)
* [createEventAccessCode](#createEventAccessCode)
* [getEventAccessCode](#getEventAccessCode)
* [updateEventAccessCode](#updateEventAccessCode)
* [getEventTransfers](#getEventTransfers)
* [getEventTeams](#getEventTeams)
* [getEventTeam](#getEventTeam)
* [getTeamAttendees](#getTeamAttendees)
 
<a name="getCategories"/>
## EventbriteAPI.getCategories
Returns a list of category as categories, including subcategories nested.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

<a name="getSingleCategory"/>
## EventbriteAPI.getSingleCategory
Gets a category by ID as category.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| categoryId| String     | Required: The ID of the category.

<a name="getSubcategories"/>
## EventbriteAPI.getSubcategories
Returns a list of subcategory as subcategories.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

<a name="getSingleSubcategory"/>
## EventbriteAPI.getSingleSubcategory
Gets a subcategory by ID as subcategory.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| subcategoryId| String     | Required: The ID of the subcategory.

<a name="getFormats"/>
## EventbriteAPI.getFormats
Returns a list of format as formats.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

<a name="getSingleFormat"/>
## EventbriteAPI.getSingleFormat
Gets a format by ID as format.

| Field   | Type       | Description
|---------|------------|----------
| token   | credentials| Required: The OAuth token obtained from Eventbrite.
| formatId| String     | Required: The ID of the format.

<a name="getMedia"/>
## EventbriteAPI.getMedia
Return an image for a given id.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| mediaId| String     | Required: The ID of the media.

<a name="uploadMedia"/>
## EventbriteAPI.uploadMedia
Upload media.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| type        | String     | Required: The type of image to upload (Valid choices are: image-event-logo, image-event-view-from-seat, image-organizer-logo, image-user-photo, or image-structured-content).
| file        | String     | Required: The file to upload.
| cropTopLeftX| String     | Optional: X coordinate for top-left corner of crop mask.
| cropTopLeftY| String     | Optional: Y coordinate for top-left corner of crop mask.
| cropWidth   | String     | Optional: Crop mask width.
| cropHeight  | String     | Optional: Crop mask height.

<a name="getTimezones"/>
## EventbriteAPI.getTimezones
Returns a response with a key of timezones, containing a list of timezones.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

<a name="getRegions"/>
## EventbriteAPI.getRegions
Returns a single page response with a key of regions, containing a list of regions.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

<a name="getCountries"/>
## EventbriteAPI.getCountries
Returns a single page response with a key of countries, containing a list of countries.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

<a name="createOrganizer"/>
## EventbriteAPI.createOrganizer
Makes a new organizer. Returns an organizer as organizer.

| Field                   | Type       | Description
|-------------------------|------------|----------
| token                   | credentials| Required: The OAuth token obtained from Eventbrite.
| organizerName           | String     | Required: The name of the organizer
| organizerDescription    | String     | Optional: The description of the organizer
| organizerLongDescription| String     | Optional: The long description of the organizer
| organizerLogoId         | String     | Optional: The logo id of the organizer
| organizerWebsite        | String     | Optional: The website for the organizer
| organizerTwitter        | String     | Optional: The Twitter handle for the organizer
| organizerFacebook       | String     | Optional: The Facebook URL ID for the organizer
| organizerInstagram      | String     | Optional: The Instagram numeric ID for the organizer

<a name="updateOrganizer"/>
## EventbriteAPI.updateOrganizer
Updates an organizer and returns it as as organizer.

| Field                   | Type       | Description
|-------------------------|------------|----------
| token                   | credentials| Required: The OAuth token obtained from Eventbrite.
| organizerId             | String     | Required: The id of the organizer
| organizerName           | String     | Required: The name of the organizer
| organizerDescription    | String     | Optional: The description of the organizer
| organizerLongDescription| String     | Optional: The long description of the organizer
| organizerLogoId         | String     | Optional: The logo id of the organizer
| organizerWebsite        | String     | Optional: The website for the organizer
| organizerTwitter        | String     | Optional: The Twitter handle for the organizer
| organizerFacebook       | String     | Optional: The Facebook URL ID for the organizer
| organizerInstagram      | String     | Optional: The Instagram numeric ID for the organizer

<a name="getOrganizer"/>
## EventbriteAPI.getOrganizer
Gets an organizer by ID as organizer.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| organizerId| String     | Required: The id of the organizer

<a name="getOrganizerEvents"/>
## EventbriteAPI.getOrganizerEvents
Gets events of the organizer.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| organizerId   | String     | Required: The id of the organizer
| status        | String     | Optional: Only return events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.
| orderBy       | String     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| startRangeDate| String     | Optional: Only return events with start dates after the given date.
| endRangeDate  | String     | Optional: Only return events with start dates before the given date.
| onlyPublic    | String     | Optional: Only show public events even if viewing your own events. True or false.

<a name="getVenue"/>
## EventbriteAPI.getVenue
Returns a venue object.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| venueId| String     | Required: The id of the venue.

<a name="updateVenue"/>
## EventbriteAPI.updateVenue
Updates a venue and returns it as an object.

| Field                | Type       | Description
|----------------------|------------|----------
| token                | credentials| Required: The OAuth token obtained from Eventbrite.
| venueId              | String     | Required: The id of the venue.
| venueName            | String     | Optional: The name of the venue.
| venueAddressLatitude | String     | Optional: The latitude of the coordinates for the venue.
| venueAddressLongitude| String     | Optional: The longitude of the coordinates for the venue.
| venueOrganizerId     | String     | Optional: The organizer this venue belongs to (optional - leave this off to use the default organizer).
| venueAddress1        | String     | Optional: The first line of the address.
| venueAddress2        | String     | Optional: The second line of the address.
| venueCity            | String     | Optional: The city where the venue is.
| venueRegion          | String     | Optional: The region where the venue is.
| venuePostalCode      | String     | Optional: The postal code where the venue is.
| venueCountry         | String     | Optional: The country where the venue is.

<a name="createVenue"/>
## EventbriteAPI.createVenue
Creates a new venue with associated address.

| Field                | Type       | Description
|----------------------|------------|----------
| token                | credentials| Required: The OAuth token obtained from Eventbrite.
| venueName            | String     | Required: The name of the venue.
| venueAddressLatitude | String     | Optional: The latitude of the coordinates for the venue.
| venueAddressLongitude| String     | Optional: The longitude of the coordinates for the venue.
| venueOrganizerId     | String     | Optional: The organizer this venue belongs to (optional - leave this off to use the default organizer).
| venueAddress1        | String     | Optional: The first line of the address.
| venueAddress2        | String     | Optional: The second line of the address.
| venueCity            | String     | Optional: The city where the venue is.
| venueRegion          | String     | Optional: The region where the venue is.
| venuePostalCode      | String     | Optional: The postal code where the venue is.
| venueCountry         | String     | Optional: The country where the venue is.

<a name="getVenueEvents"/>
## EventbriteAPI.getVenueEvents
Returns events of a given venue.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| venueId       | String     | Required: The ID of the venue.
| status        | String     | Optional: Only return events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.
| orderBy       | String     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| startRangeDate| String     | Optional: Only return events with start dates after the given date.
| endRangeDate  | String     | Optional: Only return events with start dates before the given date.
| onlyPublic    | String     | Optional: Only show public events even if viewing your own events.

<a name="getSingleWebhook"/>
## EventbriteAPI.getSingleWebhook
Returns a webhook for the specified webhook as webhook.

| Field    | Type       | Description
|----------|------------|----------
| token    | credentials| Required: The OAuth token obtained from Eventbrite.
| webhookId| String     | Required: The ID of the webhook.

<a name="createWebhook"/>
## EventbriteAPI.createWebhook
Creates a webhook for the authenticated user.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| endpointUrl| String     | Required: The target URL of the Webhook subscription.
| actions    | String     | Optional: Determines what actions will trigger the webhook. If no value is sent for this param, it selects order.placed, event.published, and event.unpublished by default.
| eventId    | String     | Optional: The ID of the event that triggers this webhook. Leave blank for all events.

<a name="getWebhooks"/>
## EventbriteAPI.getWebhooks
Returns the list of webhook objects that belong to the authenticated user.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

<a name="deleteWebhook"/>
## EventbriteAPI.deleteWebhook
Deletes the specified webhook object.

| Field    | Type       | Description
|----------|------------|----------
| token    | credentials| Required: The OAuth token obtained from Eventbrite.
| webhookId| String     | Required: The ID of the webhook.

<a name="getUser"/>
## EventbriteAPI.getUser
Returns a user for the specified user as user.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

<a name="getUserOrders"/>
## EventbriteAPI.getUserOrders
Returns a user for the specified user as user.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| userId      | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| changedSince| String     | Optional: Only return resource changed on or after the time given.
| timeFilter  | String     | Optional: Limits results to either past or current & future events / orders. (Valid choices are: all, past, or current_future).

<a name="getUserVenues"/>
## EventbriteAPI.getUserVenues
Returns a response of venue objects that are owned by the user.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

<a name="getUserOrganizers"/>
## EventbriteAPI.getUserOrganizers
Returns a response of organizer objects that are owned by the user.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

<a name="getUserOwnedEvents"/>
## EventbriteAPI.getUserOwnedEvents
Returns a response of events, under the key events, of all events the user owns (i.e. events they are organising).

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Required: The OAuth token obtained from Eventbrite.
| userId          | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| orderBy         | String     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| showSeriesParent| String     | Optional: True: Will show parent of a serie instead of children False: Will show children of a serie (Default value).
| status          | String     | Optional: Filter by events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.

<a name="getUserEvents"/>
## EventbriteAPI.getUserEvents
Returns a response of events, under the key events, of all events the user has access to.

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Required: The OAuth token obtained from Eventbrite.
| userId          | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| nameFilter      | String     | Optional: Filter event results by name.
| orderBy         | String     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| showSeriesParent| String     | Optional: True: Will show parent of a serie instead of children False: Will show children of a serie (Default value).
| status          | String     | Optional: Filter by events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.
| eventGroupId    | String     | Optional: Filter event results by eventGroupId

<a name="getUserOwnedEventAttendees"/>
## EventbriteAPI.getUserOwnedEventAttendees
Returns a response of attendees, under the key attendees, of attendees visiting any of the events the user owns.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| userId      | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| status      | String     | Optional: Limits results to either confirmed attendees or cancelled/refunded/etc. attendees (Valid choices are: attending, or not_attending).
| changedSince| String     | Optional: Only return resource changed on or after the time given.

<a name="getUserOwnedEventOrders"/>
## EventbriteAPI.getUserOwnedEventOrders
Returns a response of orders, under the key orders, of orders placed against any of the events the user owns.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| status       | String     | Optional: Filter to active (attending), inactive (not attending), or all (both) orders (Valid choices are: active, inactive, or all).
| onlyEmails   | String     | Optional: Only include orders placed by one of these emails.
| excludeEmails| String     | Optional: Don’t include orders placed by any of these emails.
| changedSince | String     | Optional: Only return resource changed on or after the time given.

<a name="getUserContactLists"/>
## EventbriteAPI.getUserContactLists
Returns a list of contact_list that the user owns as the key contact_lists.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

<a name="createUserContactList"/>
## EventbriteAPI.createUserContactList
Makes a new contact_list for the user and returns it as contact_list.

| Field          | Type       | Description
|----------------|------------|----------
| token          | credentials| Required: The OAuth token obtained from Eventbrite.
| userId         | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListName| String     | Required: Name of the new contact list.

<a name="updateContactList"/>
## EventbriteAPI.updateContactList
Updates the contact_list and returns it as contact_list.

| Field          | Type       | Description
|----------------|------------|----------
| token          | credentials| Required: The OAuth token obtained from Eventbrite.
| userId         | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId  | String     | Required: The ID of the contact list.
| contactListName| String     | Required: Name of the new contact list.

<a name="deleteUserContactList"/>
## EventbriteAPI.deleteUserContactList
Deletes the contact list. Returns {"deleted": true}.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId| String     | Required: The ID of the contact list.

<a name="getContactListContacts"/>
## EventbriteAPI.getContactListContacts
Returns the contacts on the contact list as contacts.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId| String     | Required: The ID of the contact list.

<a name="addContactToContactList"/>
## EventbriteAPI.addContactToContactList
Adds a new contact to the contact list. Returns {"created": true}. There is no way to update entries in the list; just delete the old one and add the updated version.

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Required: The OAuth token obtained from Eventbrite.
| userId          | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId   | String     | Required: The ID of the contact list.
| contactEmail    | String     | Required: Contact email address.
| contactFirstName| String     | Optional: Contact first name (or full name).
| contactLastName | String     | Optional: Contact last name.

<a name="deleteContactFromContactList"/>
## EventbriteAPI.deleteContactFromContactList
Deletes the specified contact from the contact list. Returns {"deleted": true}.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId| String     | Required: The ID of the contact list.
| email        | String     | Required: Contact email address.

<a name="getUserBookmarks"/>
## EventbriteAPI.getUserBookmarks
Gets all the user’s saved events. In order to update the saved events list, the user must unsave or save each event. A user is authorized to only see his/her saved events.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| userId        | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| bookmarkListId| String     | Optional: Optional bookmark list id to fetch all bookmarks from.

<a name="createBookmark"/>
## EventbriteAPI.createBookmark
Adds a new bookmark for the user. Returns {"created": true}. A user is only authorized to save his/her own events.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| userId        | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| eventId       | String     | Optional: Event id to bookmark for the user.
| eventIds      | String     | Optional: Event ids to batch bookmark for the user.
| bookmarkListId| String     | Optional: Optional Bookmark list id to save the bookmark(s) to.

<a name="deleteBookmark"/>
## EventbriteAPI.deleteBookmark
Removes the specified bookmark from the event for the user. Returns {"deleted": true}. A user is only authorized to unsave his/her own events.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| userId        | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| eventId       | String     | Optional: Event id to bookmark for the user.
| eventIds      | String     | Optional: Event ids to batch bookmark for the user.
| bookmarkListId| String     | Optional: Optional Bookmark list id to save the bookmark(s) to.

<a name="createEventSeries"/>
## EventbriteAPI.createEventSeries
Creates a new repeating event series. The POST data must include information for at least one event date in the series.

| Field                    | Type       | Description
|--------------------------|------------|----------
| token                    | credentials| Required: The OAuth token obtained from Eventbrite.
| seriesParentName         | String     | Required: The name of the event.
| seriesParentDescription  | String     | Optional: The description on the event page.
| seriesParentOrganizerId  | String     | Optional: The ID of the organizer of this event.
| seriesParentStartUtc     | String     | Required: The start time of the event.
| seriesParentStartTimezone| String     | Required: Start time timezone (Olson format).
| seriesParentEndUtc       | String     | Required: The end time of the event.
| seriesParentEndTimezone  | String     | Required: End time timezone (Olson format).
| seriesParentHideStartDate| String     | Optional: Whether the start date should be hidden. True or false.
| seriesParentHideEndDate  | String     | Optional: Whether the end date should be hidden. True or false.
| seriesParentCurrency     | String     | Required: Event currency (3 letter code).
| seriesParentVenueId      | String     | Optional: ID of the venue.
| seriesParentOnlineEvent  | String     | Optional: Is the event online-only (no venue)?. True or false.
| seriesParentListed       | String     | Optional: If the event is publicly listed and searchable. Defaults to true.
| seriesParentLogoId       | String     | Optional: The logo for the event.
| seriesParentCategoryId   | String     | Optional: The category (vertical) of the event.
| seriesParentSubcategoryId| String     | Optional: The subcategory of the event (US only).
| seriesParentFormatId     | String     | Optional: The format (general type) of the event.
| seriesParentShareable    | String     | Optional: If users can share the event on social media.
| seriesParentInviteOnly   | String     | Optional: Only invited users can see the event page.
| seriesParentPassword     | String     | Optional: Password needed to see the event in unlisted mode.
| seriesParentCapacity     | String     | Optional: Set specific capacity (if omitted, sums ticket capacities).
| seriesParentShowRemaining| String     | Optional: If the remaining number of tickets is publicly visible on the event page.
| createChildren           | JSON       | Required: A list of dates for which child events should be created. In the format: [{ "start": { "utc": "2015-06-15T12:00:00Z", "timezone": "America/Los_Angeles" }, "end": { "utc": "2015-06-15T13:00:00Z", "timezone": "America/Los_Angeles" } }, { ... }, ...]
| updateChildren           | JSON       | Optional: A map of event IDs to modified date objects for updating child events.
| deleteChildren           | JSON       | Optional: A list of IDs for child events that should be deleted. In the format: 1234,5678,9012

<a name="getEventSerie"/>
## EventbriteAPI.getEventSerie
Returns a repeating event series parent object for the specified repeating event series.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId     | String     | Required: The Id of the serie.
| trackingСode| String     | Optional: Append the given tracking_code to the event URLs returned.

<a name="changeEventSerie"/>
## EventbriteAPI.changeEventSerie
Updates a repeating event series parent object, and optionally also creates more event dates or updates or deletes existing event dates in the series. In order for a series date to be deleted or updated, there must be no pending or completed orders for that date.

| Field                    | Type       | Description
|--------------------------|------------|----------
| token                    | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId                  | String     | Required: The Id of the serie.
| seriesParentName         | String     | Required: The name of the event.
| seriesParentDescription  | String     | Optional: The description on the event page.
| seriesParentOrganizerId  | String     | Optional: The ID of the organizer of this event.
| seriesParentStartUtc     | String     | Required: The start time of the event.
| seriesParentStartTimezone| String     | Required: Start time timezone (Olson format).
| seriesParentEndUtc       | String     | Required: The end time of the event.
| seriesParentEndTimezone  | String     | Required: End time timezone (Olson format).
| seriesParentHideStartDate| String     | Optional: Whether the start date should be hidden. True or false.
| seriesParentHideEndDate  | String     | Optional: Whether the end date should be hidden. True or false.
| seriesParentCurrency     | String     | Required: Event currency (3 letter code).
| seriesParentVenueId      | String     | Optional: ID of the venue.
| seriesParentOnlineEvent  | String     | Optional: Is the event online-only (no venue)?. True or false.
| seriesParentListed       | String     | Optional: If the event is publicly listed and searchable. Defaults to true.
| seriesParentLogoId       | String     | Optional: The logo for the event.
| seriesParentCategoryId   | String     | Optional: The category (vertical) of the event.
| seriesParentSubcategoryId| String     | Optional: The subcategory of the event (US only).
| seriesParentFormatId     | String     | Optional: The format (general type) of the event.
| seriesParentShareable    | String     | Optional: If users can share the event on social media.
| seriesParentInviteOnly   | String     | Optional: Only invited users can see the event page.
| seriesParentPassword     | String     | Optional: Password needed to see the event in unlisted mode.
| seriesParentCapacity     | String     | Optional: Set specific capacity (if omitted, sums ticket capacities).
| seriesParentShowRemaining| String     | Optional: If the remaining number of tickets is publicly visible on the event page.
| createChildren           | JSON       | Required: A list of dates for which child events should be created. In the format: [{ "start": { "utc": "2015-06-15T12:00:00Z", "timezone": "America/Los_Angeles" }, "end": { "utc": "2015-06-15T13:00:00Z", "timezone": "America/Los_Angeles" } }, { ... }, ...]
| updateChildren           | JSON       | Optional: A map of event IDs to modified date objects for updating child events.
| deleteChildren           | JSON       | Optional: A list of IDs for child events that should be deleted. In the format: 1234,5678,9012

<a name="publishEventSerie"/>
## EventbriteAPI.publishEventSerie
Publishes a repeating event series and all of its occurrences that are not already canceled or deleted. Once a date is cancelled it can still be uncancelled and can be viewed by the public. A deleted date cannot be undeleted and cannot by viewed by the public. In order for publish to be permitted, the event must have all necessary information, including a name and description, an organizer, at least one ticket, and valid payment options.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

<a name="unpublishEventSerie"/>
## EventbriteAPI.unpublishEventSerie
Unpublishes a repeating event series and all of its occurrences that are not already completed, canceled, or deleted. In order for a free series to be unpublished, it must not have any pending or completed orders for any dates, even past dates. In order for a paid series to be unpublished, it must not have any pending or completed orders for any dates, except that completed orders for past dates that have been completed and paid out do not prevent an unpublish. Returns a boolean indicating success or failure of the unpublish.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

<a name="cancelEventSerie"/>
## EventbriteAPI.cancelEventSerie
Cancels a repeating event series and all of its occurrences that are not already canceled or deleted. In order for cancel to be permitted, there must be no pending or completed orders for any dates in the series. Returns a boolean indicating success or failure of the cancel.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

<a name="deleteEventSerie"/>
## EventbriteAPI.deleteEventSerie
Deletes a repeating event series and all of its occurrences if the delete is permitted. In order for a delete to be permitted, there must be no pending or completed orders for any dates in the series. Returns a boolean indicating success or failure of the delete.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

<a name="getSignleEventFromSerieEvents"/>
## EventbriteAPI.getSignleEventFromSerieEvents
Returns all of the events that belong to this repeating event series.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId     | String     | Required: The Id of the serie.
| timeFilter  | String     | Optional: Limits results to either past or current & future events. (Valid choices are: all, past, or current_future).
| trackingCode| String     | Optional: Append the given tracking_code to the event URLs returned.
| orderBy     | String     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc)

<a name="addSingleEventInSerieEvents"/>
## EventbriteAPI.addSingleEventInSerieEvents
Creates more event dates in a repeating event series.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId    | String     | Required: The Id of the serie.
| addChildren| JSON       | Required: A list of dates for which child events should be created. In the format: [{ "start": { "utc": "2015-06-15T12:00:00Z", "timezone": "America/Los_Angeles" }, "end": { "utc": "2015-06-15T13:00:00Z", "timezone": "America/Los_Angeles" } }, { ... }, ...]

<a name="deleteSingleEventInSerieEvents"/>
## EventbriteAPI.deleteSingleEventInSerieEvents
Deletes existing event dates in a repeating event series. In order for a series date to be deleted, there must be no pending or completed orders for that date.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId       | String     | Required: The Id of the serie.
| deleteChildren| JSON       | Required: A list of IDs for child events that should be deleted. In the format: 1234,5678,9012

<a name="searchEvent"/>
## EventbriteAPI.searchEvent
Allows you to retrieve a response of public event objects from across Eventbrite’s directory, regardless of which user owns the event.

| Field                             | Type       | Description
|-----------------------------------|------------|----------
| token                             | credentials| Required: The OAuth token obtained from Eventbrite.
| q                                 | String     | Optional: Return events matching the given keywords. This parameter will accept any string as a keyword.
| sortBy                            | String     | Optional: Parameter you want to sort by - options are “date”, “distance” and “best”. Prefix with a hyphen to reverse the order, e.g. “-date”.
| locationAddress                   | String     | Optional: The address of the location you want to search for events around.
| locationWithin                    | String     | Optional: The distance you want to search around the given location. This should be an integer followed by “mi” or “km”.
| locationLatitude                  | String     | Optional: The latitude of of the location you want to search for events around.
| locationLongitude                 | String     | Optional: The longitude of the location you want to search for events around.
| locationViewportNortheastLatitude | String     | Optional: The latitude of the northeast corner of a viewport.
| locationViewportNortheastLongitude| String     | Optional: The longitude of the northeast corner of a viewport.
| locationViewportSouthwestLatitude | String     | Optional: The latitude of the southwest corner of a viewport.
| locationViewportSouthwestLongitude| String     | Optional: The longitude of the southwest corner of a viewport.
| organizerId                       | String     | Optional: Only return events organized by the given Organizer ID.
| userId                            | String     | Optional: Only return events owned by the given User ID.
| trackingCode                      | String     | Optional: Append the given tracking_code to the event URLs returned.
| categories                        | String     | Optional: Only return events under the given category IDs. This should be a comma delimited string of category IDs.
| subcategories                     | String     | Optional: Only return events under the given subcategory IDs. This should be a comma delimited string of subcategory IDs.
| formats                           | String     | Optional: Only return events with the given format IDs. This should be a comma delimited string of format IDs.
| price                             | String     | Optional: Only return events that are “free” or “paid”
| DateRangeStart                    | String     | Optional: Only return events with start dates after the given date.
| DateRangeEnd                      | String     | Optional: Only return events with start dates before the given date.
| startDateKeyword                  | String     | Optional: Only return events with start dates within the given keyword date range. Keyword options are “this_week”, “next_week”, “this_weekend”, “next_month”, “this_month”, “tomorrow”, “today”
| ModifiedRangeStart                | String     | Optional: Only return events with modified dates after the given UTC date.
| ModifiedRangeEnd                  | String     | Optional: Only return events with modified dates before the given UTC date.
| ModifiedKeyword                   | String     | Optional: Only return events with modified dates within the given keyword date range. Keyword options are “this_week”, “next_week”, “this_weekend”, “next_month”, “this_month”, “tomorrow”, “today”
| searchType                        | String     | Optional: Use the preconfigured settings for this type of search - Current option is “promoted”
| includeAllSeriesInstances         | String     | Optional: Boolean for whether or not you want to see all instances of repeating events in search results.
| includeUnavailableEvents          | String     | Optional: Boolean for whether or not you want to see events without tickets on sale.
| incorporateUserAffinities         | String     | Optional: Incorporate additional information from the user’s historic preferences.
| highAffinityCategories            | String     | Optional: Make search results prefer events in these categories. This should be a comma delimited string of category IDs.

<a name="createEvent"/>
## EventbriteAPI.createEvent
Makes a new event, and returns an event for the specified event. Does not support the creation of repeating event series.

| Field             | Type       | Description
|-------------------|------------|----------
| token             | credentials| Required: The OAuth token obtained from Eventbrite.
| eventName         | String     | Required: The name of the event. Value cannot be empty nor whitespace.
| eventDescription  | String     | Optional: The description on the event page.
| eventOrganizerId  | String     | Optional: The ID of the organizer of this event.
| eventStartUtc     | String     | Required: The start time of the event.
| eventStartTimezone| String     | Required: Start time timezone (Olson format).
| eventEndUtc       | String     | Required: The end time of the event.
| eventEndTimezone  | String     | Required: End time timezone (Olson format).
| eventHideStartDate| String     | Optional: Whether the start date should be hidden.
| eventHideEndDate  | String     | Optional: Whether the end date should be hidden.
| eventCurrency     | String     | Required: Event currency (3 letter code).
| eventVenueId      | String     | Optional: The ID of a previously-created venue to associate with this event. You can omit this field or set it to null if you set online_event.
| eventOnlineEvent  | String     | Optional: Is the event online-only (no venue).
| eventListed       | String     | Optional: If the event is publicly listed and searchable. Defaults to True.
| eventLogoId       | String     | Optional: The logo for the event.
| eventCategoryId   | String     | Optional: The category (vertical) of the event.
| eventSubcategoryId| String     | Optional: The subcategory of the event (US only).
| eventFormatId     | String     | Optional: The format (general type) of the event.
| eventShareable    | String     | Optional: If users can share the event on social media.
| eventInviteOnly   | String     | Optional: Only invited users can see the event page.
| eventPassword     | String     | Optional: Password needed to see the event in unlisted mode.
| eventCapacity     | String     | Optional: Set specific capacity (if omitted, sums ticket capacities).
| eventShowRemaining| String     | Optional: If the remaining number of tickets is publicly visible on the event page.
| eventSource       | String     | Optional: Source of the event (defaults to API).

<a name="getEventById"/>
## EventbriteAPI.getEventById
Returns an event for the specified event. Many of Eventbrite’s API use cases revolve around pulling details of a specific event within an Eventbrite account. Does not support fetching a repeating event series parent.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="updateEvent"/>
## EventbriteAPI.updateEvent
Updates an event. Returns an event for the specified event. Does not support updating a repeating event series parent

| Field             | Type       | Description
|-------------------|------------|----------
| token             | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId           | String     | Required: The ID of the event.
| eventName         | String     | Required: The name of the event. Value cannot be empty nor whitespace.
| eventDescription  | String     | Optional: The description on the event page.
| eventOrganizerId  | String     | Optional: The ID of the organizer of this event.
| eventStartUtc     | String     | Required: The start time of the event.
| eventStartTimezone| String     | Required: Start time timezone (Olson format).
| eventEndUtc       | String     | Required: The end time of the event.
| eventEndTimezone  | String     | Required: End time timezone (Olson format).
| eventHideStartDate| String     | Optional: Whether the start date should be hidden.
| eventHideEndDate  | String     | Optional: Whether the end date should be hidden.
| eventCurrency     | String     | Required: Event currency (3 letter code).
| eventVenueId      | String     | Optional: The ID of a previously-created venue to associate with this event. You can omit this field or set it to null if you set online_event.
| eventOnlineEvent  | String     | Optional: Is the event online-only (no venue).
| eventListed       | String     | Optional: If the event is publicly listed and searchable. Defaults to True.
| eventLogoId       | String     | Optional: The logo for the event.
| eventCategoryId   | String     | Optional: The category (vertical) of the event.
| eventSubcategoryId| String     | Optional: The subcategory of the event (US only).
| eventFormatId     | String     | Optional: The format (general type) of the event.
| eventShareable    | String     | Optional: If users can share the event on social media.
| eventInviteOnly   | String     | Optional: Only invited users can see the event page.
| eventPassword     | String     | Optional: Password needed to see the event in unlisted mode.
| eventCapacity     | String     | Optional: Set specific capacity (if omitted, sums ticket capacities).
| eventShowRemaining| String     | Optional: If the remaining number of tickets is publicly visible on the event page.
| eventSource       | String     | Optional: Source of the event (defaults to API).

<a name="publishEvent"/>
## EventbriteAPI.publishEvent
Publishes an event if it has not already been deleted. In order for publish to be permitted, the event must have all necessary information, including a name and description, an organizer, at least one ticket, and valid payment options. This API endpoint will return argument errors for event fields that fail to validate the publish requirements. Returns a boolean indicating success or failure of the publish.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="unpublishEvent"/>
## EventbriteAPI.unpublishEvent
Unpublishes an event. In order for a free event to be unpublished, it must not have any pending or completed orders, even if the event is in the past. In order for a paid event to be unpublished, it must not have any pending or completed orders, unless the event has been completed and paid out. Returns a boolean indicating success or failure of the unpublish.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="cancelEvent"/>
## EventbriteAPI.cancelEvent
Cancels an event if it has not already been deleted. In order for cancel to be permitted, there must be no pending or completed orders. Returns a boolean indicating success or failure of the cancel.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="deleteEvent"/>
## EventbriteAPI.deleteEvent
Deletes an event if the delete is permitted. In order for a delete to be permitted, there must be no pending or completed orders. Returns a boolean indicating success or failure of the delete.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="getEventDisplaySettings"/>
## EventbriteAPI.getEventDisplaySettings
Retrieves the display settings for an event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="updateEventDisplaySettings"/>
## EventbriteAPI.updateEventDisplaySettings
Updates the display settings for an event.

| Field                   | Type       | Description
|-------------------------|------------|----------
| token                   | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId                 | String     | Required: The ID of the event.
| showStartDate           | String     | Optional: Whether to display the start date on the event listing.
| showEndDate             | String     | Optional: Whether to display the end date on the event listing.
| showStartEndTime        | String     | Optional: Whether to display event start and end time on the event listing.
| showTimezone            | String     | Optional: Whether to display the event timezone on the event listing.
| showMap                 | String     | Optional: Whether to display a map to the venue on the event listing.
| showRemaining           | String     | Optional: Whether to display the number of remaining tickets.
| showOrganizerFacebook   | String     | Optional: Whether to display a link to the organizer’s Facebook profile.
| showOrganizerTwitter    | String     | Optional: Whether to display a link to the organizer’s Twitter profile.
| showFacebookFriendsGoing| String     | Optional: Whether to display which of the user’s Facebook friends are going.
| terminology             | String     | Optional: Which terminology should be used to refer to the event (Valid choices are: tickets_vertical, or endurance_vertical).

<a name="getEventTicketClasses"/>
## EventbriteAPI.getEventTicketClasses
Returns a response with a key of ticket_classes, containing a list of ticket_class.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| pos    | String     | Optional: Only return ticket classes valid for the given point of sale (Valid choices are: online, or at_the_door).

<a name="createEventTicketClass"/>
## EventbriteAPI.createEventTicketClass
Creates a new ticket class, returning the result as a ticket_class under the key ticket_class.

| Field                   | Type       | Description
|-------------------------|------------|----------
| token                   | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId                 | String     | Required: The ID of the event.
| name                    | String     | Optional: Name of this ticket type.
| description             | String     | Optional: Description of the ticket.
| quantityTotal           | String     | Optional: Total available number of this ticket.
| cost                    | String     | Optional: Cost of the ticket (currently currency must match event currency) e.g. $45 would be ‘USD,4500’.
| donation                | String     | Optional: Is this a donation? (user-supplied cost)
| free                    | String     | Optional: Is this a free ticket?
| includeFee              | String     | Optional: Absorb the fee into the displayed cost.
| splitFee                | String     | Optional: Absorb the payment fee, but show the eventbrite fee.
| hideDescription         | String     | Optional: Hide the ticket description on the event page.
| salesChannels           | String     | Optional: A list of all supported sales channels ([“online”], [“online”, “atd”], [“atd”]).
| salesStart              | String     | Optional: When the ticket is available for sale (leave empty for ‘when event published’).
| salesEnd                | String     | Optional: When the ticket stops being on sale (leave empty for ‘one hour before event start’).
| salesStartAfter         | String     | Optional: The ID of another ticket class - when it sells out, this class will go on sale.
| minimumQuantity         | String     | Optional: Minimum number per order.
| autoHide                | String     | Optional: Hide this ticket when it is not on sale.
| autoHideBefore          | String     | Optional: Override reveal date for auto-hide.
| autoHideAfter           | String     | Optional: Override re-hide date for auto-hide.
| hidden                  | String     | Optional: Hide this ticket.
| orderConfirmationMessage| String     | Optional: Order message per ticket type.

<a name="getEventTicketClass"/>
## EventbriteAPI.getEventTicketClass
Gets and returns a single ticket_class by ID, as the key ticket_class.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId      | String     | Required: The ID of the event.
| ticketClassId| String     | Required: The ID of the ticket class.

<a name="updateEventTicketClass"/>
## EventbriteAPI.updateEventTicketClass
Updates an existing ticket class, returning the updated result as a ticket_class under the key ticket_class.

| Field                   | Type       | Description
|-------------------------|------------|----------
| token                   | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId                 | String     | Required: The ID of the event.
| ticketClassId           | String     | Required: The ID of the ticket class.
| name                    | String     | Optional: Name of this ticket type.
| description             | String     | Optional: Description of the ticket.
| quantityTotal           | String     | Optional: Total available number of this ticket.
| cost                    | String     | Optional: Cost of the ticket (currently currency must match event currency) e.g. $45 would be ‘USD,4500’.
| donation                | String     | Optional: Is this a donation? (user-supplied cost)
| free                    | String     | Optional: Is this a free ticket?
| includeFee              | String     | Optional: Absorb the fee into the displayed cost.
| splitFee                | String     | Optional: Absorb the payment fee, but show the eventbrite fee.
| hideDescription         | String     | Optional: Hide the ticket description on the event page.
| salesChannels           | String     | Optional: A list of all supported sales channels ([“online”], [“online”, “atd”], [“atd”]).
| salesStart              | String     | Optional: When the ticket is available for sale (leave empty for ‘when event published’).
| salesEnd                | String     | Optional: When the ticket stops being on sale (leave empty for ‘one hour before event start’).
| salesStartAfter         | String     | Optional: The ID of another ticket class - when it sells out, this class will go on sale.
| minimumQuantity         | String     | Optional: Minimum number per order.
| autoHide                | String     | Optional: Hide this ticket when it is not on sale.
| autoHideBefore          | String     | Optional: Override reveal date for auto-hide.
| autoHideAfter           | String     | Optional: Override re-hide date for auto-hide.
| hidden                  | String     | Optional: Hide this ticket.
| orderConfirmationMessage| String     | Optional: Order message per ticket type.

<a name="deleteEventTicketClass"/>
## EventbriteAPI.deleteEventTicketClass
Deletes the ticket class. Returns {"deleted": true}.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId      | String     | Required: The ID of the event.
| ticketClassId| String     | Required: The ID of the ticket class.

<a name="addEventQuestion"/>
## EventbriteAPI.addEventQuestion
Eventbrite allows event organizers to add custom questions that attendees fill out upon registration. This endpoint can be helpful for determining what custom information is collected and available per event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| asOwner| String     | Optional: Return private events and more details. True or false.

<a name="getEventAttendees"/>
## EventbriteAPI.getEventAttendees
Returns a response with a key of attendees, containing a list of attendee.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId     | String     | Required: The ID of the event.
| status      | String     | Optional: Limits results to either confirmed attendees or cancelled/refunded/etc. attendees (Valid choices are: attending, not_attending, or unpaid).
| changedSince| String     | Optional: Only return attendees changed on or after the time given.
| lastItemSeen| String     | Optional: Only return attendees changed on or after the time given and with an id bigger than last item seen.

<a name="getEventOrders"/>
## EventbriteAPI.getEventOrders
Returns a response with a key of orders, containing a list of order against this event.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId      | String     | Required: The ID of the event.
| status       | String     | Optional: Filter to active (attending), inactive (not attending), or all (both) orders (Valid choices are: active, inactive, or all).
| changedSince | String     | Optional: Only return orders changed on or after the time given.
| lastItemSeen | String     | Optional: Only return orders changed on or after the time given and with an id bigger than last item seen.
| onlyEmails   | String     | Optional: Only include orders placed by one of these emails.
| excludeEmails| String     | Optional: Don’t include orders placed by any of these emails.

<a name="getEventDiscounts"/>
## EventbriteAPI.getEventDiscounts
Returns a response with a key of discounts, containing a list of discounts available on this event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="createEventDiscount"/>
## EventbriteAPI.createEventDiscount
Returns a response with a key of discounts, containing a list of discounts available on this event.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| code             | String     | Required: Code used to activate discount.
| amountOff        | String     | Optional: Fixed reduction amount.
| percentOff       | String     | Optional: Percentage reduction.
| ticketIds        | String     | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | String     | Optional: Allow use from this date.
| endDate          | String     | Optional: Allow use until this date.

<a name="getEventDiscount"/>
## EventbriteAPI.getEventDiscount
Gets a discount by ID as the key discount.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId   | String     | Required: The ID of the event.
| discountId| String     | Required: The ID of the discount.

<a name="updateEventDiscount"/>
## EventbriteAPI.updateEventDiscount
Updates a discount; returns the result as a discount as the key discount.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| discountId       | String     | Required: The ID of the discount.
| code             | String     | Required: Code used to activate discount.
| amountOff        | String     | Optional: Fixed reduction amount.
| percentOff       | String     | Optional: Percentage reduction.
| ticketIds        | String     | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | String     | Optional: Allow use from this date.
| endDate          | String     | Optional: Allow use until this date.

<a name="getEventPublicDiscounts"/>
## EventbriteAPI.getEventPublicDiscounts
Updates a discount; returns the result as a discount as the key discount.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="createEventPublicDiscount"/>
## EventbriteAPI.createEventPublicDiscount
Creates a new public discount; returns the result as a discount as the key discount.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| code             | String     | Required: Code used to activate discount.
| amountOff        | String     | Optional: Fixed reduction amount.
| percentOff       | String     | Optional: Percentage reduction.
| ticketIds        | String     | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | String     | Optional: Allow use from this date.
| endDate          | String     | Optional: Allow use until this date.

<a name="getEventPublicDiscount"/>
## EventbriteAPI.getEventPublicDiscount
Gets a public discount by ID as the key discount.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId   | String     | Required: The ID of the event.
| discountId| String     | Required: The ID of the discount.

<a name="updateEventPublicDiscount"/>
## EventbriteAPI.updateEventPublicDiscount
Updates a public discount; returns the result as a discount as the key discount.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| discountId       | String     | Required: The ID of the discount.
| code             | String     | Required: Code used to activate discount.
| amountOff        | String     | Optional: Fixed reduction amount.
| percentOff       | String     | Optional: Percentage reduction.
| ticketIds        | String     | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | String     | Optional: Allow use from this date.
| endDate          | String     | Optional: Allow use until this date.

<a name="deleteEventPublicDiscount"/>
## EventbriteAPI.deleteEventPublicDiscount
Deletes a public discount.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId   | String     | Required: The ID of the event.
| discountId| String     | Required: The ID of the discount.

<a name="getEventAccessCodes"/>
## EventbriteAPI.getEventAccessCodes
Returns a response with a key of access_codes, containing a list of access_codes available on this event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="createEventAccessCode"/>
## EventbriteAPI.createEventAccessCode
Creates a new access code; returns the result as a access_code as the key access_code.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| code             | String     | Required: Code used to initiate access.
| ticketIds        | String     | Required: Comma-separated IDs of tickets to allow access to.
| quantityAvailable| String     | Optional: Number of uses.
| startDate        | String     | Optional: Allow use from this date.
| endDate          | String     | Optional: Allow use until this date.

<a name="getEventAccessCode"/>
## EventbriteAPI.getEventAccessCode
Gets a access_code by ID as the key access_code.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId     | String     | Required: The ID of the event.
| accessCodeId| String     | Required: The Id of the access code.

<a name="updateEventAccessCode"/>
## EventbriteAPI.updateEventAccessCode
Updates an access code; returns the result as a access_code as the key access_code.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| accessCodeId     | String     | Required: The Id of the access code.
| code             | String     | Required: Code used to initiate access.
| ticketIds        | String     | Required: Comma-separated IDs of tickets to allow access to.
| quantityAvailable| String     | Optional: Number of uses.
| startDate        | String     | Optional: Allow use from this date.
| endDate          | String     | Optional: Allow use until this date.

<a name="getEventTransfers"/>
## EventbriteAPI.getEventTransfers
Returns a list of transfers for the event.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId     | String     | Required: The ID of the event.
| changedSince| String     | Optional: Only return transfers changed on or after the time given.

<a name="getEventTeams"/>
## EventbriteAPI.getEventTeams
Returns a list of teams for the event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

<a name="getEventTeam"/>
## EventbriteAPI.getEventTeam
Returns information for a single teams.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| teamId | String     | Required: The ID of the team.

<a name="getTeamAttendees"/>
## EventbriteAPI.getTeamAttendees
Returns attendees for a single teams.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| teamId | String     | Required: The ID of the team.

