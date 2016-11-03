<?php

namespace Tests\Functional;

require_once __DIR__ . '/../../src/Models/paginationClass.php';

class EventbriteAPITest extends BaseTestCase {
    
    protected $token = "NBK3VHGHLTHWPTGMFQDW";

    public function testgetCategories() {
        
        $var = '{
                    "args": {
                      "token": "'.$this->token.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getCategories', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetSingleCategory() {
        
        $var = '{
                    "args": {
                      "token": "'.$this->token.'",
                      "categoryId": "103"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getSingleCategory', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetSubcategories() {
        
        $var = '{
                    "args": {
                      "token": "'.$this->token.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getSubcategories', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetSingleSubcategory() {
        
        $var = '{
                    "args": {
                      "token": "'.$this->token.'",
                      "subcategoryId": "1001"                          
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getSingleSubcategory', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetFormats() {
        
        $var = '{
                    "args": {
                      "token": "'.$this->token.'"                          
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getFormats', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetSingleFormat() {
        
        $var = '{
                    "args": {
                      "token": "'.$this->token.'",
                          "formatId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getSingleFormat', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetMedia() {
        
        $var = '{
                    "args": {
                      "token": "'.$this->token.'",
                          "mediaId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getMedia', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testuploadMedia() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "type": "image-organizer-logo",
                        "file": "http://www.israel21c.org/wp-content/uploads/2015/01/143.jpg",
                        "cropTopLeftX": "5",
                        "cropTopLeftY": "20",
                        "cropWidth": "50",
                        "cropHeight": "50" 
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/uploadMedia', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetOrder() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "orderId": "1" 
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getOrder', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    public function testgetSalesReport() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventIds": "28860239754"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getSalesReport', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetAttendeesReport() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventIds": "28860239754"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getAttendeesReport', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetTimezones() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getTimezones', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetRegions() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getRegions', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetCountries() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getCountries', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateOrganizer() {
        
        $name = "org_".rand(1,100000);
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "organizerName": "'.$name.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createOrganizer', $post_data);
        
        $orgId = json_decode($response->getBody())->contextWrites->to->id;

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $orgId;
    }
    
    /**
     * @depends testcreateOrganizer
     */
    public function testupdateOrganizer($orgId) {
        
        $name = "new_name_test";
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "organizerId": "'.$orgId.'",
                        "organizerName": "'.$name.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateOrganizer', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateOrganizer
     */
    public function testgetOrganizer($orgId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "organizerId": "'.$orgId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getOrganizer', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateOrganizer
     */
    public function testgetOrganizerEvents($orgId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "organizerId": "'.$orgId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getOrganizerEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateVenue() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "venueName": "My venue",
                        "venueCity": "San Francisco",
                        "venueAddressLatitude": "37.602044",
                        "venueAddressLongitude": "-122.427215"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createVenue', $post_data);
        
        $venueId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $venueId;
    }
    
    /**
     * @depends testcreateVenue
     */
    public function testgetVenue($venueId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "venueId": "'.$venueId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getVenue', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateVenue
     */
    public function testupdateVenue($venueId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "venueId": "'.$venueId.'",
                        "venueName": "new updated name"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateVenue', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateVenue
     */
    public function testgetVenueEvents($venueId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "venueId": "'.$venueId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getVenueEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetWebhooks() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getWebhooks', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateWebhook() {
        
        $url = "http://test.com/hook_".rand(1,100000);
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "endpointUrl": "'.$url.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createWebhook', $post_data);
        
        $hookId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $hookId;
    }
    
    /**
     * @depends testcreateWebhook
     */
    public function testgetSingleWebhook($hookId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "webhookId": "'.$hookId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getSingleWebhook', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateWebhook
     */
    public function testdeleteWebhook($hookId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "webhookId": "'.$hookId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteWebhook', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUser() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUser', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserOrders() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserOrders', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserVenues() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserVenues', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserOrganizers() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserOrganizers', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserOwnedEvents() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserOwnedEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserEvents() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserOwnedEventAttendees() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserOwnedEventAttendees', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserOwnedEventOrders() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserOwnedEventOrders', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserContactLists() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserContactLists', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateUserContactList() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "contactListName": "list name"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createUserContactList', $post_data);
        
        $listId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $listId;
    }
    
    /**
     * @depends testcreateUserContactList
     */
    public function testupdateContactList($listId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "contactListId": "'.$listId.'",
                        "contactListName": "list name updated"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateContactList', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateUserContactList
     */
    public function testgetContactListContacts($listId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "contactListId": "'.$listId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getContactListContacts', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateUserContactList
     */
    public function testaddContactToContactList($listId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "contactListId": "'.$listId.'",
                        "contactEmail": "test_100@test.com"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/addContactToContactList', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateUserContactList
     */
    public function testdeleteContactFromContactList($listId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "contactListId": "'.$listId.'",
                        "email": "test_100@test.com"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteContactFromContactList', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateUserContactList
     */
    public function testdeleteUserContactList($listId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "contactListId": "'.$listId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteUserContactList', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetUserBookmarks() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getUserBookmarks', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateBookmark() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "eventId": "27782265504"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createBookmark', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testdeleteBookmark() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "userId": "me",
                        "eventId": "27782265504"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteBookmark', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateEventSeries() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "seriesParentName": "Test",
                        "seriesParentStartUtc": "2017-10-26T9:00:00Z",
                        "seriesParentStartTimezone": "America/Los_Angeles",
                        "seriesParentEndUtc": "2017-10-27T12:00:00Z",
                        "seriesParentEndTimezone": "America/Los_Angeles",
                        "seriesParentCurrency": "USD",
                        "createChildren": "[{ \"start\": { \"utc\": \"2018-10-26T09:00:00Z\", \"timezone\": \"America/Los_Angeles\" }, \"end\": { \"utc\": \"2018-10-27T12:00:00Z\", \"timezone\": \"America/Los_Angeles\" } }]"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createEventSeries', $post_data);
        
        $eventSerieId = json_decode($response->getBody())->contextWrites->to->series_parent->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $eventSerieId;
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testgetEventSerie($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "'.$eventSerieId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventSerie', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testchangeEventSerie($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "'.$eventSerieId.'",
                        "seriesParentName": "Test",
                        "seriesParentStartUtc": "2017-10-26T9:00:00Z",
                        "seriesParentStartTimezone": "America/Los_Angeles",
                        "seriesParentEndUtc": "2017-10-27T12:00:00Z",
                        "seriesParentEndTimezone": "America/Los_Angeles",
                        "seriesParentCurrency": "EUR",
                        "createChildren": "[{ \"start\": { \"utc\": \"2017-11-26T09:00:00Z\", \"timezone\": \"America/Los_Angeles\" }, \"end\": { \"utc\": \"2017-11-27T12:00:00Z\", \"timezone\": \"America/Los_Angeles\" } }]"
                    }
                }';

        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/changeEventSerie', $post_data);
       
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testpublishEventSerie($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "'.$eventSerieId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/publishEventSerie', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testunpublishEventSerie($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "'.$eventSerieId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/unpublishEventSerie', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testcancelEventSerie($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "'.$eventSerieId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/cancelEventSerie', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testgetSignleEventFromSerieEvents($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "'.$eventSerieId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getSignleEventFromSerieEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testaddSingleEventInSerieEvents($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "28857678092",
                        "addChildren": "[{ \"start\": { \"utc\": \"2017-06-15T12:00:00Z\", \"timezone\": \"America/Los_Angeles\" }, \"end\": { \"utc\": \"2017-06-15T13:00:00Z\", \"timezone\": \"America/Los_Angeles\" } }]"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/addSingleEventInSerieEvents', $post_data);
        
        $childrenId = json_decode($response->getBody())->contextWrites->to->children_created[0];
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $childrenId;
    }
    
    /**
     * @depends testcreateEventSeries
     * @depends testaddSingleEventInSerieEvents
     */
    public function testdeleteSingleEventInSerieEvents($eventSerieId, $childrenId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "28857678092",
                        "deleteChildren": "'.$childrenId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteSingleEventInSerieEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventSeries
     */
    public function testdeleteEventSerie($eventSerieId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "serieId": "'.$eventSerieId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteEventSerie', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testsearchEvent() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "price": "free",
                        "q": "Global Conference on Nanotechnology and Materials"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/searchEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateEvent() {
        
        $datetime = new \DateTime('tomorrow');
        $datetime->modify('+1 day');
        $day1 = $datetime->format('Y-m-d');
        $day2 = $datetime->format('Y-m-d');
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventName": "New test event",
                        "eventStartUtc": "'.$day1.'T09:00:00Z",
                        "eventStartTimezone": "Europe/Kiev",
                        "eventEndUtc": "'.$day2.'T19:00:00Z",
                        "eventEndTimezone": "Europe/Kiev",
                        "eventCurrency": "USD"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createEvent', $post_data);
        
        $eventId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $eventId;
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventById($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventById', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testupdateEvent($eventId) {
        
        $datetime = new \DateTime('tomorrow');
        $datetime->modify('+3 day');
        $day1 = $datetime->format('Y-m-d');
        $day2 = $datetime->format('Y-m-d');
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "eventName": "UPdated New test event",
                        "eventStartUtc": "'.$day1.'T09:00:00Z",
                        "eventStartTimezone": "Europe/Kiev",
                        "eventEndUtc": "'.$day2.'T19:00:00Z",
                        "eventEndTimezone": "Europe/Kiev",
                        "eventCurrency": "USD"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testpublishEvent($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/publishEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testunpublishEvent($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/unpublishEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testcancelEvent($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/cancelEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventDisplaySettings($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventDisplaySettings', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testupdateEventDisplaySettings($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "showMap": "true",
                        "showRemaining": "false"                            
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateEventDisplaySettings', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventTicketClasses($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"                           
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventTicketClasses', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testcreateEventTicketClass($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "name": "first ticket",
                        "cost": "USD,5",
                        "quantityTotal": "1"                            
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createEventTicketClass', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetEventTicketClass() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "ticketClassId": "56726599"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventTicketClass', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testupdateEventTicketClass() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "ticketClassId": "56726599",
                        "name": "first ticket11111",
                        "cost": "USD,2"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateEventTicketClass', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testdeleteEventTicketClass() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "ticketClassId": "56726598"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteEventTicketClass', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testaddEventQuestion($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"                            
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/addEventQuestion', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventQuestion($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "questionId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventQuestion', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventAttendees($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventAttendees', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEvent($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "attendeeId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventOrders($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventOrders', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventDiscounts($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventDiscounts', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testcreateEventDiscount($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "code": "code_134",
                        "amountOff": "USD,1"                            
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createEventDiscount', $post_data);
        
        $discountId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $discountId;
    }
    
    public function testgetEventDiscount() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "discountId": "263866426"                            
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventDiscount', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testupdateEventDiscount() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "discountId": "263866426",
                        "code": "code_135",
                        "amountOff": "USD,1"                        
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateEventDiscount', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetEventPublicDiscounts() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754"                       
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventPublicDiscounts', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateEventPublicDiscount() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "code": "public_0",
                        "percentOff": "20"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createEventPublicDiscount', $post_data);
        $pubDiscId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $pubDiscId;
    }
    
    /**
     * @depends testcreateEventPublicDiscount
     */
    public function testgetEventPublicDiscount($pubDiscId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "discountId": "'.$pubDiscId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventPublicDiscount', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventPublicDiscount
     */
    public function testupdateEventPublicDiscount($pubDiscId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "discountId": "'.$pubDiscId.'",
                        "code": "public_0",
                        "percentOff": "25"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateEventPublicDiscount', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventPublicDiscount
     */
    public function testdeleteEventPublicDiscount($pubDiscId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "discountId": "'.$pubDiscId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteEventPublicDiscount', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testgetEventAccessCodes() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventAccessCodes', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testcreateEventAccessCode() {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "code": "acc_1",
                        "ticketIds": "56726599"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/createEventAccessCode', $post_data);
        
        $accessId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $accessId;
    }
    
    /**
     * @depends testcreateEventAccessCode
     */
    public function testgetEventAccessCode($accessId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "accessCodeId": "'.$accessId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventAccessCode', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEventAccessCode
     */
    public function testupdateEventAccessCode($accessId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "28860239754",
                        "accessCodeId": "'.$accessId.'",
                        "code": "acc_1",
                        "ticketIds": "56726599",
                        "quantityAvailable": "2"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/updateEventAccessCode', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventTransfers($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventTransfers', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventTeams($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventTeams', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetEventTeam($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "teamId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getEventTeam', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testgetTeamAttendees($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'",
                        "teamId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/getTeamAttendees', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testcreateEvent
     */
    public function testdeleteEvent($eventId) {
        
        $var = '{
                    "args": {
                        "token": "'.$this->token.'",
                        "eventId": "'.$eventId.'"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/EventbriteAPI/deleteEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }

}
