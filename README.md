[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/EventbriteAPI/functions?utm_source=RapidAPIGitHub_EventbriteFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# EventbriteAPI Package
Find, create and organize events.
* Domain: eventbrite.com
* Credentials: token

## How to get credentials: 
0. Sign up or log in to [EventBrite](https://www.eventbrite.com/login/)
1. Go to [App Management](https://www.eventbrite.com/myaccount/apps/)
2. Create a new app.
3. After creation new app you will see the link **Show Client Secret and OAuth Token**. Click on it for show your OAuth token.


## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```

## EventbriteAPI.getCategories
Returns a list of category as categories, including subcategories nested.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

## EventbriteAPI.getSingleCategory
Gets a category by ID as category.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| categoryId| String     | Required: The ID of the category.

## EventbriteAPI.getSubcategories
Returns a list of subcategory as subcategories.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

## EventbriteAPI.getSingleSubcategory
Gets a subcategory by ID as subcategory.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| subcategoryId| String     | Required: The ID of the subcategory.

## EventbriteAPI.getFormats
Returns a list of format as formats.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

## EventbriteAPI.getSingleFormat
Gets a format by ID as format.

| Field   | Type       | Description
|---------|------------|----------
| token   | credentials| Required: The OAuth token obtained from Eventbrite.
| formatId| String     | Required: The ID of the format.

## EventbriteAPI.getMedia
Return an image for a given id.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| mediaId| String     | Required: The ID of the media.

## EventbriteAPI.uploadMedia
Upload media.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| type        | Select     | Required: The type of image to upload (Valid choices are: image-event-logo, image-event-view-from-seat, image-organizer-logo, image-user-photo, or image-structured-content).
| file        | File       | Required: The file to upload.
| cropTopLeftX| String     | Optional: X coordinate for top-left corner of crop mask.
| cropTopLeftY| String     | Optional: Y coordinate for top-left corner of crop mask.
| cropWidth   | String     | Optional: Crop mask width.
| cropHeight  | String     | Optional: Crop mask height.

## EventbriteAPI.getSalesReport
Returns a response of the aggregate sales data.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| eventIds   | List       | Required: List of public event IDs to report on.
| eventStatus| Select     | Optional: Event status to filter down results by (Valid choices are: all, live, or ended).
| startDate  | DatePicker | Optional: Optional start date to query.
| endDate    | DatePicker | Optional: Optional end date to query.
| period     | String     | Optional: Time period to provide aggregation for in units of the selected dateFacet. For example, if dateFacet=hour, then period=3 returns 3 hours worth of data from the current time in the event timezone. Day is the default choice if no dateFacet.
| filterBy   | String     | Optional: Optional filters for sales/attendees data formatted as: {“ticket_ids”: [1234, 5678], “countries”: [“US”],...}
| groupBy    | Select     | Optional: Optional field to group data on (Valid choices are: payment_method, payment_method_application, ticket, ticket_application, currency, event_currency, reservedSection, event, event_ticket, event_application, country, city, state, or source).
| dateFacet  | Select     | Optional: Optional date aggregation level to return data for. Day is the default choice. Monthly aggregation is represented by the first of the month. Weekly aggregation is represented by the ending Sunday of the week, where a week is defined as Monday-Sunday. (Valid choices are: hour, day, week, month, year, or none).
| timezone   | String     | Optional: Optional timezone. If unspecified picks the TZ of the first event.
| randomSeed | String     | Optional: Random seed for dataset (default = 0). Aids in determinism.

## EventbriteAPI.getAttendeesReport
Returns a response of the aggregate attendees data.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| eventIds   | List       | Required: List of public event IDs to report on.
| eventStatus| Select     | Optional: Event status to filter down results by (Valid choices are: all, live, or ended).
| startDate  | DatePicker | Optional: Optional start date to query.
| endDate    | DatePicker | Optional: Optional end date to query.
| period     | String     | Optional: Time period to provide aggregation for in units of the selected dateFacet. For example, if dateFacet=hour, then period=3 returns 3 hours worth of data from the current time in the event timezone. Day is the default choice if no dateFacet.
| filterBy   | String     | Optional: Optional filters for sales/attendees data formatted as: {“ticket_ids”: [1234, 5678], “countries”: [“US”],...}
| groupBy    | String     | Optional: Optional field to group data on (Valid choices are: payment_method, payment_method_application, ticket, ticket_application, currency, event_currency, reservedSection, event, event_ticket, event_application, country, city, state, or source).
| dateFacet  | Select     | Optional: Optional date aggregation level to return data for. Day is the default choice. Monthly aggregation is represented by the first of the month. Weekly aggregation is represented by the ending Sunday of the week, where a week is defined as Monday-Sunday. (Valid choices are: hour, day, week, month, year, or none).
| timezone   | String     | Optional: Optional timezone. If unspecified picks the TZ of the first event.
| randomSeed | String     | Optional: Random seed for dataset (default = 0). Aids in determinism.

## EventbriteAPI.getTimezones
Returns a response with a key of timezones, containing a list of timezones.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

## EventbriteAPI.getRegions
Returns a single page response with a key of regions, containing a list of regions.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

## EventbriteAPI.getCountries
Returns a single page response with a key of countries, containing a list of countries.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

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

## EventbriteAPI.getOrganizer
Gets an organizer by ID as organizer.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| organizerId| String     | Required: The id of the organizer

## EventbriteAPI.getOrganizerEvents
Gets events of the organizer.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| organizerId   | String     | Required: The id of the organizer
| status        | List       | Optional: Only return events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.
| orderBy       | Select     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| startRangeDate| DatePicker | Optional: Only return events with start dates after the given date.
| endRangeDate  | DatePicker | Optional: Only return events with start dates before the given date.
| onlyPublic    | Boolean    | Optional: Only show public events even if viewing your own events. True or false.

## EventbriteAPI.getVenue
Returns a venue object.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| venueId| String     | Required: The id of the venue.

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

## EventbriteAPI.getVenueEvents
Returns events of a given venue.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| venueId       | String     | Required: The ID of the venue.
| status        | List       | Optional: Only return events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.
| orderBy       | Select     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| startRangeDate| DatePicker | Optional: Only return events with start dates after the given date.
| endRangeDate  | DatePicker | Optional: Only return events with start dates before the given date.
| onlyPublic    | Boolean    | Optional: Only show public events even if viewing your own events.

## EventbriteAPI.getSingleWebhook
Returns a webhook for the specified webhook as webhook.

| Field    | Type       | Description
|----------|------------|----------
| token    | credentials| Required: The OAuth token obtained from Eventbrite.
| webhookId| String     | Required: The ID of the webhook.

## EventbriteAPI.createWebhook
Creates a webhook for the authenticated user.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| endpointUrl| String     | Required: The target URL of the Webhook subscription.
| actions    | String     | Optional: Determines what actions will trigger the webhook. If no value is sent for this param, it selects order.placed, event.published, and event.unpublished by default.
| eventId    | String     | Optional: The ID of the event that triggers this webhook. Leave blank for all events.

## EventbriteAPI.getWebhooks
Returns the list of webhook objects that belong to the authenticated user.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Required: The OAuth token obtained from Eventbrite.

## EventbriteAPI.deleteWebhook
Deletes the specified webhook object.

| Field    | Type       | Description
|----------|------------|----------
| token    | credentials| Required: The OAuth token obtained from Eventbrite.
| webhookId| String     | Required: The ID of the webhook.

## EventbriteAPI.getUser
Returns a user for the specified user as user.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

## EventbriteAPI.getUserOrders
Returns a user for the specified user as user.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| userId      | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| changedSince| String     | Optional: Only return resource changed on or after the time given.
| timeFilter  | Select     | Optional: Limits results to either past or current & future events / orders. (Valid choices are: all, past, or current_future).

## EventbriteAPI.getUserVenues
Returns a response of venue objects that are owned by the user.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

## EventbriteAPI.getUserOrganizers
Returns a response of organizer objects that are owned by the user.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

## EventbriteAPI.getUserOwnedEvents
Returns a response of events, under the key events, of all events the user owns (i.e. events they are organising).

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Required: The OAuth token obtained from Eventbrite.
| userId          | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| orderBy         | Select     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| showSeriesParent| Boolean    | Optional: True: Will show parent of a serie instead of children False: Will show children of a serie (Default value).
| status          | List       | Optional: Filter by events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.

## EventbriteAPI.getUserEvents
Returns a response of events, under the key events, of all events the user has access to.

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Required: The OAuth token obtained from Eventbrite.
| userId          | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| nameFilter      | String     | Optional: Filter event results by name.
| orderBy         | Select     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc).
| showSeriesParent| Boolean    | Optional: True: Will show parent of a serie instead of children False: Will show children of a serie (Default value).
| status          | List     | Optional: Filter by events with a specific status set. This should be a comma delimited string of status. Valid status: all, draft, live, canceled, started, ended.
| eventGroupId    | String     | Optional: Filter event results by eventGroupId

## EventbriteAPI.getUserOwnedEventAttendees
Returns a response of attendees, under the key attendees, of attendees visiting any of the events the user owns.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| userId      | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| status      | Select     | Optional: Limits results to either confirmed attendees or cancelled/refunded/etc. attendees (Valid choices are: attending, or not_attending).
| changedSince| DatePicker | Optional: Only return resource changed on or after the time given.

## EventbriteAPI.getUserOwnedEventOrders
Returns a response of orders, under the key orders, of orders placed against any of the events the user owns.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| status       | Select     | Optional: Filter to active (attending), inactive (not attending), or all (both) orders (Valid choices are: active, inactive, or all).
| onlyEmails   | List       | Optional: Only include orders placed by one of these emails.
| excludeEmails| List       | Optional: Don’t include orders placed by any of these emails.
| changedSince | DatePicker | Optional: Only return resource changed on or after the time given.

## EventbriteAPI.getUserContactLists
Returns a list of contact_list that the user owns as the key contact_lists.

| Field | Type       | Description
|-------|------------|----------
| token | credentials| Required: The OAuth token obtained from Eventbrite.
| userId| String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.

## EventbriteAPI.createUserContactList
Makes a new contact_list for the user and returns it as contact_list.

| Field          | Type       | Description
|----------------|------------|----------
| token          | credentials| Required: The OAuth token obtained from Eventbrite.
| userId         | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListName| String     | Required: Name of the new contact list.

## EventbriteAPI.updateContactList
Updates the contact_list and returns it as contact_list.

| Field          | Type       | Description
|----------------|------------|----------
| token          | credentials| Required: The OAuth token obtained from Eventbrite.
| userId         | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId  | String     | Required: The ID of the contact list.
| contactListName| String     | Required: Name of the new contact list.

## EventbriteAPI.deleteUserContactList
Deletes the contact list. Returns {"deleted": true}.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId| String     | Required: The ID of the contact list.

## EventbriteAPI.getContactListContacts
Returns the contacts on the contact list as contacts.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId| String     | Required: The ID of the contact list.

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

## EventbriteAPI.deleteContactFromContactList
Deletes the specified contact from the contact list. Returns {"deleted": true}.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| userId       | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| contactListId| String     | Required: The ID of the contact list.
| email        | String     | Required: Contact email address.

## EventbriteAPI.getUserBookmarks
Gets all the user’s saved events. In order to update the saved events list, the user must unsave or save each event. A user is authorized to only see his/her saved events.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| userId        | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| bookmarkListId| String     | Optional: Optional bookmark list id to fetch all bookmarks from.

## EventbriteAPI.createBookmark
Adds a new bookmark for the user. Returns {"created": true}. A user is only authorized to save his/her own events.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| userId        | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| eventId       | String     | Optional: Event id to bookmark for the user.
| eventIds      | List       | Optional: Event ids to batch bookmark for the user.
| bookmarkListId| String     | Optional: Optional Bookmark list id to save the bookmark(s) to.

## EventbriteAPI.deleteBookmark
Removes the specified bookmark from the event for the user. Returns {"deleted": true}. A user is only authorized to unsave his/her own events.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| userId        | String     | Required: The ID of the user. If you want to get details about the currently authenticated user, use "me" value.
| eventId       | String     | Optional: Event id to bookmark for the user.
| eventIds      | List       | Optional: Event ids to batch bookmark for the user.
| bookmarkListId| String     | Optional: Optional Bookmark list id to save the bookmark(s) to.

## EventbriteAPI.createEventSeries
Creates a new repeating event series. The POST data must include information for at least one event date in the series.

| Field                    | Type       | Description
|--------------------------|------------|----------
| token                    | credentials| Required: The OAuth token obtained from Eventbrite.
| seriesParentName         | String     | Required: The name of the event.
| seriesParentDescription  | String     | Optional: The description on the event page.
| seriesParentOrganizerId  | String     | Optional: The ID of the organizer of this event.
| seriesParentStartUtc     | DatePicker | Required: The start time of the event.
| seriesParentStartTimezone| String     | Required: Start time timezone (Olson format).
| seriesParentEndUtc       | DatePicker | Required: The end time of the event.
| seriesParentEndTimezone  | String     | Required: End time timezone (Olson format).
| seriesParentHideStartDate| Boolean    | Optional: Whether the start date should be hidden. True or false.
| seriesParentHideEndDate  | Boolean    | Optional: Whether the end date should be hidden. True or false.
| seriesParentCurrency     | String     | Required: Event currency (3 letter code).
| seriesParentVenueId      | String     | Optional: ID of the venue.
| seriesParentOnlineEvent  | Boolean    | Optional: Is the event online-only (no venue)?. True or false.
| seriesParentListed       | Boolean    | Optional: If the event is publicly listed and searchable. Defaults to true.
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
| deleteChildren           | List       | Optional: A list of IDs for child events that should be deleted. In the format: 1234,5678,9012

### createChildren format
```json
[  
    {  
        "start":{  
            "utc":"2015-06-15T12:00:00Z",
            "timezone":"America/Los_Angeles"
        },
        "end":{  
            "utc":"2015-06-15T13:00:00Z",
            "timezone":"America/Los_Angeles"
        }
    },
    {}
]
```
### updateChildren format
```json
{  
    "1234":{  
        "start":{  
            "utc":"2015-06-15T12:00:00Z",
            "timezone":"America/Los_Angeles"
        },
        "end":{  
            "utc":"2015-06-15T13:00:00Z",
            "timezone":"America/Los_Angeles"
        }
    },
    "5678":{}
    
}
```

## EventbriteAPI.getEventSerie
Returns a repeating event series parent object for the specified repeating event series.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId     | String     | Required: The Id of the serie.
| trackingСode| String     | Optional: Append the given tracking_code to the event URLs returned.

## EventbriteAPI.changeEventSerie
Updates a repeating event series parent object, and optionally also creates more event dates or updates or deletes existing event dates in the series. In order for a series date to be deleted or updated, there must be no pending or completed orders for that date.

| Field                    | Type       | Description
|--------------------------|------------|----------
| token                    | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId                  | String     | Required: The Id of the serie.
| seriesParentName         | String     | Required: The name of the event.
| seriesParentDescription  | String     | Optional: The description on the event page.
| seriesParentOrganizerId  | String     | Optional: The ID of the organizer of this event.
| seriesParentStartUtc     | DatePicker | Required: The start time of the event.
| seriesParentStartTimezone| String     | Required: Start time timezone (Olson format).
| seriesParentEndUtc       | DatePicker | Required: The end time of the event.
| seriesParentEndTimezone  | String     | Required: End time timezone (Olson format).
| seriesParentHideStartDate| Boolean    | Optional: Whether the start date should be hidden. True or false.
| seriesParentHideEndDate  | Boolean    | Optional: Whether the end date should be hidden. True or false.
| seriesParentCurrency     | String     | Required: Event currency (3 letter code).
| seriesParentVenueId      | String     | Optional: ID of the venue.
| seriesParentOnlineEvent  | Boolean    | Optional: Is the event online-only (no venue)?. True or false.
| seriesParentListed       | Boolean    | Optional: If the event is publicly listed and searchable. Defaults to true.
| seriesParentLogoId       | String     | Optional: The logo for the event.
| seriesParentCategoryId   | String     | Optional: The category (vertical) of the event.
| seriesParentSubcategoryId| String     | Optional: The subcategory of the event (US only).
| seriesParentFormatId     | String     | Optional: The format (general type) of the event.
| seriesParentShareable    | String     | Optional: If users can share the event on social media.
| seriesParentInviteOnly   | String     | Optional: Only invited users can see the event page.
| seriesParentPassword     | String     | Optional: Password needed to see the event in unlisted mode.
| seriesParentCapacity     | String     | Optional: Set specific capacity (if omitted, sums ticket capacities).
| seriesParentShowRemaining| String     | Optional: If the remaining number of tickets is publicly visible on the event page.
| createChildren           | JSON       | Required: A list of dates for which child events should be created. 
| updateChildren           | JSON       | Optional: A map of event IDs to modified date objects for updating child events.
| deleteChildren           | List       | Optional: A list of IDs for child events that should be deleted. In the format: 1234,5678,9012

### createChildren format
```json
[  
    {  
        "start":{  
            "utc":"2015-06-15T12:00:00Z",
            "timezone":"America/Los_Angeles"
        },
        "end":{  
            "utc":"2015-06-15T13:00:00Z",
            "timezone":"America/Los_Angeles"
        }
    },
    {}
]
```
### updateChildren format
```json
{  
    "1234":{  
        "start":{  
            "utc":"2015-06-15T12:00:00Z",
            "timezone":"America/Los_Angeles"
        },
        "end":{  
            "utc":"2015-06-15T13:00:00Z",
            "timezone":"America/Los_Angeles"
        }
    },
    "5678":{}
}
```

## EventbriteAPI.publishEventSerie
Publishes a repeating event series and all of its occurrences that are not already canceled or deleted. Once a date is cancelled it can still be uncancelled and can be viewed by the public. A deleted date cannot be undeleted and cannot by viewed by the public. In order for publish to be permitted, the event must have all necessary information, including a name and description, an organizer, at least one ticket, and valid payment options.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

## EventbriteAPI.unpublishEventSerie
Unpublishes a repeating event series and all of its occurrences that are not already completed, canceled, or deleted. In order for a free series to be unpublished, it must not have any pending or completed orders for any dates, even past dates. In order for a paid series to be unpublished, it must not have any pending or completed orders for any dates, except that completed orders for past dates that have been completed and paid out do not prevent an unpublish. Returns a boolean indicating success or failure of the unpublish.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

## EventbriteAPI.cancelEventSerie
Cancels a repeating event series and all of its occurrences that are not already canceled or deleted. In order for cancel to be permitted, there must be no pending or completed orders for any dates in the series. Returns a boolean indicating success or failure of the cancel.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

## EventbriteAPI.deleteEventSerie
Deletes a repeating event series and all of its occurrences if the delete is permitted. In order for a delete to be permitted, there must be no pending or completed orders for any dates in the series. Returns a boolean indicating success or failure of the delete.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId| String     | Required: The Id of the serie.

## EventbriteAPI.getSignleEventFromSerieEvents
Returns all of the events that belong to this repeating event series.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId     | String     | Required: The Id of the serie.
| timeFilter  | Select     | Optional: Limits results to either past or current & future events. (Valid choices are: all, past, or current_future).
| trackingCode| String     | Optional: Append the given tracking_code to the event URLs returned.
| orderBy     | Select     | Optional: How to order the results (Valid choices are: start_asc, start_desc, created_asc, or created_desc)

## EventbriteAPI.addSingleEventInSerieEvents
Creates more event dates in a repeating event series.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId    | String     | Required: The Id of the serie.
| addChildren| JSON       | Required: A list of dates for which child events should be created. In the format: 

### addChildren format
```json
[  
    {  
        "start":{  
            "utc":"2015-06-15T12:00:00Z",
            "timezone":"America/Los_Angeles"
        },
        "end":{  
            "utc":"2015-06-15T13:00:00Z",
            "timezone":"America/Los_Angeles"
        }
    },
    {}
]
```

## EventbriteAPI.deleteSingleEventInSerieEvents
Deletes existing event dates in a repeating event series. In order for a series date to be deleted, there must be no pending or completed orders for that date.

| Field         | Type       | Description
|---------------|------------|----------
| token         | credentials| Required: The OAuth token obtained from Eventbrite.
| serieId       | String     | Required: The Id of the serie.
| deleteChildren| List       | Required: A list of IDs for child events that should be deleted. In the format: 1234,5678,9012

## EventbriteAPI.searchEvent
Allows you to retrieve a response of public event objects from across Eventbrite’s directory, regardless of which user owns the event.

| Field                             | Type       | Description
|-----------------------------------|------------|----------
| token                             | credentials| Required: The OAuth token obtained from Eventbrite.
| q                                 | String     | Optional: Return events matching the given keywords. This parameter will accept any string as a keyword.
| sortBy                            | Select     | Optional: Parameter you want to sort by - options are “date”, “distance” and “best”. Prefix with a hyphen to reverse the order, e.g. “-date”.
| locationAddress                   | String     | Optional: The address of the location you want to search for events around.
| locationWithin                    | String     | Optional: The distance you want to search around the given location. This should be an integer followed by “mi” or “km”.
| location                          | Map        | The location you want to search for events around
| locationViewportNortheast         | Map        | The location of the northeast corner of a viewport
| locationViewportSouthwest         | Map        | The location of the southwest corner of a viewport
| organizerId                       | String     | Optional: Only return events organized by the given Organizer ID.
| userId                            | String     | Optional: Only return events owned by the given User ID.
| trackingCode                      | String     | Optional: Append the given tracking_code to the event URLs returned.
| categories                        | List       | Optional: Only return events under the given category IDs. This should be a comma delimited string of category IDs.
| subcategories                     | List       | Optional: Only return events under the given subcategory IDs. This should be a comma delimited string of subcategory IDs.
| formats                           | List       | Optional: Only return events with the given format IDs. This should be a comma delimited string of format IDs.
| price                             | Select     | Optional: Only return events that are “free” or “paid”
| DateRangeStart                    | DatePicker | Optional: Only return events with start dates after the given date.
| DateRangeEnd                      | DatePicker | Optional: Only return events with start dates before the given date.
| startDateKeyword                  | Select     | Optional: Only return events with start dates within the given keyword date range. Keyword options are “this_week”, “next_week”, “this_weekend”, “next_month”, “this_month”, “tomorrow”, “today”
| ModifiedRangeStart                | DatePicker | Optional: Only return events with modified dates after the given UTC date.
| ModifiedRangeEnd                  | DatePicker | Optional: Only return events with modified dates before the given UTC date.
| ModifiedKeyword                   | Select     | Optional: Only return events with modified dates within the given keyword date range. Keyword options are “this_week”, “next_week”, “this_weekend”, “next_month”, “this_month”, “tomorrow”, “today”
| searchType                        | String     | Optional: Use the preconfigured settings for this type of search - Current option is “promoted”
| includeAllSeriesInstances         | Boolean    | Optional: Boolean for whether or not you want to see all instances of repeating events in search results.
| includeUnavailableEvents          | Boolean    | Optional: Boolean for whether or not you want to see events without tickets on sale.
| incorporateUserAffinities         | String     | Optional: Incorporate additional information from the user’s historic preferences.
| highAffinityCategories            | List       | Optional: Make search results prefer events in these categories. This should be a comma delimited string of category IDs.

## EventbriteAPI.createEvent
Makes a new event, and returns an event for the specified event. Does not support the creation of repeating event series.

| Field             | Type       | Description
|-------------------|------------|----------
| token             | credentials| Required: The OAuth token obtained from Eventbrite.
| eventName         | String     | Required: The name of the event. Value cannot be empty nor whitespace.
| eventDescription  | String     | Optional: The description on the event page.
| eventOrganizerId  | String     | Optional: The ID of the organizer of this event.
| eventStartUtc     | DatePicker | Required: The start time of the event.
| eventStartTimezone| String     | Required: Start time timezone (Olson format).
| eventEndUtc       | DatePicker | Required: The end time of the event.
| eventEndTimezone  | String     | Required: End time timezone (Olson format).
| eventHideStartDate| Boolean    | Optional: Whether the start date should be hidden.
| eventHideEndDate  | Boolean    | Optional: Whether the end date should be hidden.
| eventCurrency     | String     | Required: Event currency (3 letter code).
| eventVenueId      | String     | Optional: The ID of a previously-created venue to associate with this event. You can omit this field or set it to null if you set online_event.
| eventOnlineEvent  | Boolean    | Optional: Is the event online-only (no venue).
| eventListed       | Boolean    | Optional: If the event is publicly listed and searchable. Defaults to True.
| eventLogoId       | String     | Optional: The logo for the event.
| eventCategoryId   | String     | Optional: The category (vertical) of the event.
| eventSubcategoryId| String     | Optional: The subcategory of the event (US only).
| eventFormatId     | String     | Optional: The format (general type) of the event.
| eventShareable    | Boolean    | Optional: If users can share the event on social media.
| eventInviteOnly   | Boolean    | Optional: Only invited users can see the event page.
| eventPassword     | String     | Optional: Password needed to see the event in unlisted mode.
| eventCapacity     | String     | Optional: Set specific capacity (if omitted, sums ticket capacities).
| eventShowRemaining| Boolean    | Optional: If the remaining number of tickets is publicly visible on the event page.
| eventSource       | String     | Optional: Source of the event (defaults to API).

## EventbriteAPI.getEventById
Returns an event for the specified event. Many of Eventbrite’s API use cases revolve around pulling details of a specific event within an Eventbrite account. Does not support fetching a repeating event series parent.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.updateEvent
Updates an event. Returns an event for the specified event. Does not support updating a repeating event series parent

| Field             | Type       | Description
|-------------------|------------|----------
| token             | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId           | String     | Required: The ID of the event.
| eventName         | String     | Required: The name of the event. Value cannot be empty nor whitespace.
| eventDescription  | String     | Optional: The description on the event page.
| eventOrganizerId  | String     | Optional: The ID of the organizer of this event.
| eventStartUtc     | DatePicker | Required: The start time of the event.
| eventStartTimezone| String     | Required: Start time timezone (Olson format).
| eventEndUtc       | DatePicker | Required: The end time of the event.
| eventEndTimezone  | String     | Required: End time timezone (Olson format).
| eventHideStartDate| Boolean    | Optional: Whether the start date should be hidden.
| eventHideEndDate  | Boolean    | Optional: Whether the end date should be hidden.
| eventCurrency     | String     | Required: Event currency (3 letter code).
| eventVenueId      | String     | Optional: The ID of a previously-created venue to associate with this event. You can omit this field or set it to null if you set online_event.
| eventOnlineEvent  | Boolean    | Optional: Is the event online-only (no venue).
| eventListed       | Boolean    | Optional: If the event is publicly listed and searchable. Defaults to True.
| eventLogoId       | String     | Optional: The logo for the event.
| eventCategoryId   | String     | Optional: The category (vertical) of the event.
| eventSubcategoryId| String     | Optional: The subcategory of the event (US only).
| eventFormatId     | String     | Optional: The format (general type) of the event.
| eventShareable    | Boolean    | Optional: If users can share the event on social media.
| eventInviteOnly   | Boolean    | Optional: Only invited users can see the event page.
| eventPassword     | String     | Optional: Password needed to see the event in unlisted mode.
| eventCapacity     | String     | Optional: Set specific capacity (if omitted, sums ticket capacities).
| eventShowRemaining| Boolean    | Optional: If the remaining number of tickets is publicly visible on the event page.
| eventSource       | String     | Optional: Source of the event (defaults to API).

## EventbriteAPI.publishEvent
Publishes an event if it has not already been deleted. In order for publish to be permitted, the event must have all necessary information, including a name and description, an organizer, at least one ticket, and valid payment options. This API endpoint will return argument errors for event fields that fail to validate the publish requirements. Returns a boolean indicating success or failure of the publish.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.unpublishEvent
Unpublishes an event. In order for a free event to be unpublished, it must not have any pending or completed orders, even if the event is in the past. In order for a paid event to be unpublished, it must not have any pending or completed orders, unless the event has been completed and paid out. Returns a boolean indicating success or failure of the unpublish.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.cancelEvent
Cancels an event if it has not already been deleted. In order for cancel to be permitted, there must be no pending or completed orders. Returns a boolean indicating success or failure of the cancel.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.deleteEvent
Deletes an event if the delete is permitted. In order for a delete to be permitted, there must be no pending or completed orders. Returns a boolean indicating success or failure of the delete.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.getEventDisplaySettings
Retrieves the display settings for an event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.updateEventDisplaySettings
Updates the display settings for an event.

| Field                   | Type       | Description
|-------------------------|------------|----------
| token                   | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId                 | String     | Required: The ID of the event.
| showStartDate           | Boolean    | Optional: Whether to display the start date on the event listing.
| showEndDate             | Boolean    | Optional: Whether to display the end date on the event listing.
| showStartEndTime        | Boolean    | Optional: Whether to display event start and end time on the event listing.
| showTimezone            | Boolean    | Optional: Whether to display the event timezone on the event listing.
| showMap                 | Boolean    | Optional: Whether to display a map to the venue on the event listing.
| showRemaining           | Boolean    | Optional: Whether to display the number of remaining tickets.
| showOrganizerFacebook   | Boolean    | Optional: Whether to display a link to the organizer’s Facebook profile.
| showOrganizerTwitter    | Boolean    | Optional: Whether to display a link to the organizer’s Twitter profile.
| showFacebookFriendsGoing| Boolean    | Optional: Whether to display which of the user’s Facebook friends are going.
| terminology             | String     | Optional: Which terminology should be used to refer to the event (Valid choices are: tickets_vertical, or endurance_vertical).

## EventbriteAPI.getEventTicketClasses
Returns a response with a key of ticket_classes, containing a list of ticket_class.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| pos    | Select     | Optional: Only return ticket classes valid for the given point of sale (Valid choices are: online, or at_the_door).

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
| donation                | Boolean    | Optional: Is this a donation? (user-supplied cost)
| free                    | Boolean    | Optional: Is this a free ticket?
| includeFee              | Boolean    | Optional: Absorb the fee into the displayed cost.
| splitFee                | Boolean    | Optional: Absorb the payment fee, but show the eventbrite fee.
| hideDescription         | Boolean    | Optional: Hide the ticket description on the event page.
| salesChannels           | String     | Optional: A list of all supported sales channels ([“online”], [“online”, “atd”], [“atd”]).
| salesStart              | DatePicker | Optional: When the ticket is available for sale (leave empty for ‘when event published’).
| salesEnd                | DatePicker | Optional: When the ticket stops being on sale (leave empty for ‘one hour before event start’).
| salesStartAfter         | String     | Optional: The ID of another ticket class - when it sells out, this class will go on sale.
| minimumQuantity         | String     | Optional: Minimum number per order.
| autoHide                | Boolean    | Optional: Hide this ticket when it is not on sale.
| autoHideBefore          | DatePicker | Optional: Override reveal date for auto-hide.
| autoHideAfter           | DatePicker | Optional: Override re-hide date for auto-hide.
| hidden                  | Boolean    | Optional: Hide this ticket.
| orderConfirmationMessage| String     | Optional: Order message per ticket type.

## EventbriteAPI.getEventTicketClass
Gets and returns a single ticket_class by ID, as the key ticket_class.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId      | String     | Required: The ID of the event.
| ticketClassId| String     | Required: The ID of the ticket class.

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
| donation                | Boolean    | Optional: Is this a donation? (user-supplied cost)
| free                    | Boolean    | Optional: Is this a free ticket?
| includeFee              | Boolean    | Optional: Absorb the fee into the displayed cost.
| splitFee                | Boolean    | Optional: Absorb the payment fee, but show the eventbrite fee.
| hideDescription         | Boolean    | Optional: Hide the ticket description on the event page.
| salesChannels           | String     | Optional: A list of all supported sales channels ([“online”], [“online”, “atd”], [“atd”]).
| salesStart              | DatePicker | Optional: When the ticket is available for sale (leave empty for ‘when event published’).
| salesEnd                | DatePicker | Optional: When the ticket stops being on sale (leave empty for ‘one hour before event start’).
| salesStartAfter         | String     | Optional: The ID of another ticket class - when it sells out, this class will go on sale.
| minimumQuantity         | String     | Optional: Minimum number per order.
| autoHide                | Boolean    | Optional: Hide this ticket when it is not on sale.
| autoHideBefore          | DatePicker | Optional: Override reveal date for auto-hide.
| autoHideAfter           | DatePicker | Optional: Override re-hide date for auto-hide.
| hidden                  | Boolean    | Optional: Hide this ticket.
| orderConfirmationMessage| String     | Optional: Order message per ticket type.

## EventbriteAPI.deleteEventTicketClass
Deletes the ticket class. Returns {"deleted": true}.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId      | String     | Required: The ID of the event.
| ticketClassId| String     | Required: The ID of the ticket class.

## EventbriteAPI.addEventQuestion
Eventbrite allows event organizers to add custom questions that attendees fill out upon registration. This endpoint can be helpful for determining what custom information is collected and available per event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| asOwner| Boolean    | Optional: Return private events and more details. True or false.

## EventbriteAPI.getEventAttendees
Returns a response with a key of attendees, containing a list of attendee.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId     | String     | Required: The ID of the event.
| status      | Select     | Optional: Limits results to either confirmed attendees or cancelled/refunded/etc. attendees (Valid choices are: attending, not_attending, or unpaid).
| changedSince| DatePicker | Optional: Only return attendees changed on or after the time given.
| lastItemSeen| String     | Optional: Only return attendees changed on or after the time given and with an id bigger than last item seen.

## EventbriteAPI.getEventOrders
Returns a response with a key of orders, containing a list of order against this event.

| Field        | Type       | Description
|--------------|------------|----------
| token        | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId      | String     | Required: The ID of the event.
| status       | Select     | Optional: Filter to active (attending), inactive (not attending), or all (both) orders (Valid choices are: active, inactive, or all).
| changedSince | DatePicker | Optional: Only return orders changed on or after the time given.
| lastItemSeen | String     | Optional: Only return orders changed on or after the time given and with an id bigger than last item seen.
| onlyEmails   | List       | Optional: Only include orders placed by one of these emails.
| excludeEmails| List       | Optional: Don’t include orders placed by any of these emails.

## EventbriteAPI.getEventDiscounts
Returns a response with a key of discounts, containing a list of discounts available on this event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.createEventDiscount
Returns a response with a key of discounts, containing a list of discounts available on this event.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| code             | String     | Required: Code used to activate discount.
| amountOff        | String     | Optional: Fixed reduction amount.
| percentOff       | String     | Optional: Percentage reduction.
| ticketIds        | List       | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | DatePicker | Optional: Allow use from this date.
| endDate          | DatePicker | Optional: Allow use until this date.

## EventbriteAPI.getEventDiscount
Gets a discount by ID as the key discount.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId   | String     | Required: The ID of the event.
| discountId| String     | Required: The ID of the discount.

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
| ticketIds        | List       | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | DatePicker | Optional: Allow use from this date.
| endDate          | DatePicker | Optional: Allow use until this date.

## EventbriteAPI.getEventPublicDiscounts
Updates a discount; returns the result as a discount as the key discount.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.createEventPublicDiscount
Creates a new public discount; returns the result as a discount as the key discount.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| code             | String     | Required: Code used to activate discount.
| amountOff        | String     | Optional: Fixed reduction amount.
| percentOff       | String     | Optional: Percentage reduction.
| ticketIds        | List       | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | DatePicker | Optional: Allow use from this date.
| endDate          | DatePicker | Optional: Allow use until this date.

## EventbriteAPI.getEventPublicDiscount
Gets a public discount by ID as the key discount.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId   | String     | Required: The ID of the event.
| discountId| String     | Required: The ID of the discount.

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
| ticketIds        | List       | Optional: IDs of tickets to limit discount to.
| quantityAvailable| String     | Optional: Number of discount uses.
| startDate        | DatePicker | Optional: Allow use from this date.
| endDate          | DatePicker | Optional: Allow use until this date.

## EventbriteAPI.deleteEventPublicDiscount
Deletes a public discount.

| Field     | Type       | Description
|-----------|------------|----------
| token     | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId   | String     | Required: The ID of the event.
| discountId| String     | Required: The ID of the discount.

## EventbriteAPI.getEventAccessCodes
Returns a response with a key of access_codes, containing a list of access_codes available on this event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.createEventAccessCode
Creates a new access code; returns the result as a access_code as the key access_code.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| code             | String     | Required: Code used to initiate access.
| ticketIds        | List       | Required: Comma-separated IDs of tickets to allow access to.
| quantityAvailable| String     | Optional: Number of uses.
| startDate        | DatePicker | Optional: Allow use from this date.
| endDate          | DatePicker | Optional: Allow use until this date.

## EventbriteAPI.getEventAccessCode
Gets a access_code by ID as the key access_code.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId     | String     | Required: The ID of the event.
| accessCodeId| String     | Required: The Id of the access code.

## EventbriteAPI.updateEventAccessCode
Updates an access code; returns the result as a access_code as the key access_code.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId          | String     | Required: The ID of the event.
| accessCodeId     | String     | Required: The Id of the access code.
| code             | String     | Required: Code used to initiate access.
| ticketIds        | List       | Required: Comma-separated IDs of tickets to allow access to.
| quantityAvailable| String     | Optional: Number of uses.
| startDate        | DatePicker | Optional: Allow use from this date.
| endDate          | DatePicker | Optional: Allow use until this date.

## EventbriteAPI.getEventTransfers
Returns a list of transfers for the event.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId     | String     | Required: The ID of the event.
| changedSince| DatePicker | Optional: Only return transfers changed on or after the time given.

## EventbriteAPI.getEventTeams
Returns a list of teams for the event.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.

## EventbriteAPI.getEventTeam
Returns information for a single teams.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| teamId | String     | Required: The ID of the team.

## EventbriteAPI.getTeamAttendees
Returns attendees for a single teams.

| Field  | Type       | Description
|--------|------------|----------
| token  | credentials| Required: The OAuth token obtained from Eventbrite.
| eventId| String     | Required: The ID of the event.
| teamId | String     | Required: The ID of the team.

