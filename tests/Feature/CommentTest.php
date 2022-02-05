<?php

namespace Tests\Feature;

use Tests\TestCase;

class CommentTest extends TestCase
{
    public function test_can_create_comment()
    {
        $data = [
            "body" => $this->faker->text,
        ];

        $response = $this->post(route("create-comment", ["postId" => 1234]), $data);
        $response->assertCreated();

    }

    public function test_can_create_reply_comment()
    {
        $id = $this->test_can_list_comment();
        $data = [
            "body" => $this->faker->text,
            "parent_id" => $id
        ];

        $response = $this->post(route("create-comment", ["postId" => 1234]), $data);
        $body = $response->baseResponse->original;

        $response->assertCreated();
        $this->assertEquals($body->parent_id, $id);
    }

    public function test_can_not_create_comment_with_no_body()
    {
        $data = [];

        $response = $this->post(route("create-comment", ["postId" => 1234]), $data);
        $body = $response->baseResponse->original;

        $response->assertStatus(422);
        $this->assertEquals("Validation Error", $body["error"]);

    }

    public function test_can_list_comment()
    {
        $response = $this->get(route("list-comments", ["postId" => 1234]));
        $body = $response->baseResponse->original;

        $response->assertOk();
        $this->assertNotEmpty($body);

        return $body[0]->id;
    }

}
