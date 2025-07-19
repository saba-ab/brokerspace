<?php


// it('registers user successfully', function () {
//     $response = $this->postJson('/api/v1/auth/register', [
//         'name' => 'John Doe',
//         'email' => 'john.doemama@gmail.com',
//         'password' => 'password123',
//     ]);

//     $response->assertStatus(200);
//     $response->assertJsonFragment([
//         'name' => 'John Doe',
//         'email' => 'john.doe@gmail.com',
//     ]);

//     $this->assertDatabaseHas('users', [
//         'name' => 'John Doe',
//         'email' => 'john.doe@gmail.com',
//     ]);
// });

// tests/Feature/SanityTest.php
test('testing config works', function () {
    expect(config('app.env'))->toBe('testing');
    expect(DB::connection()->getDatabaseName())->toBe('brokerspace_testing');
});
