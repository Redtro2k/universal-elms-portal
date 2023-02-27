<?php

it('has route page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
