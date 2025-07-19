<?php

it('creates a deal', function () {
    $broker = createBrokerUser();
    $property = createProperty();
    $token = $broker->createToken('test')->plainTextToken;

    $this->actingAs($broker, 'api');
    $data = [
        'property_id' => $property->id,
        'user_id' => $broker->id,
        'type' => 'sale',
        'status' => 'pending',
        'property_price' => 100000.00,
        'commission_percentage' => 10,
        'commission_amount' => 10000,
        'owner_name' => 'John Doe',
        'owner_phone' => '+1234567890',
        'owner_email' => 'john.doe@gmail.com',
        'broker_id' => $broker->id,
    ];
    $response = $this->withHeader('Authorization', "Bearer $token")
    ->postJson('/api/v1/deals', $data);

    $response->assertStatus(200);
});
