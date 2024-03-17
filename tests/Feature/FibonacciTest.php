<?php

namespace Tests\Feature;

use Tests\TestCase;

class FibonacciTest extends TestCase
{
    // リクエストの値が大きい数値でも正しく処理されるか
    public function test_request_high_number(): void
    {
        $request = ['n' => '99'];

        $response = $this->get(route('fib', $request));

        $response->assertStatus(200);

        $this->assertEquals($response['result'], 218922995834555169026);
    }

    // リクエストの値が0の場合でも正しく処理されるか
    public function test_request_number_of_zero(): void
    {
        $request = ['n' => '0'];

        $response = $this->get(route('fib', $request));

        $response->assertStatus(200);

        $this->assertEquals($response['result'], 0);
    }

    // リクエストの値が文字列の場合にエラーを返すか
    public function test_request_string(): void
    {
        $request = ['n' => 'エヌ'];

        $response = $this->get(route('fib', $request));

        $response->assertStatus(400);

        $this->assertEquals($response['status'], 400);
        $this->assertEquals($response['message'], 'Bad request');
    }

    // リクエストの値が負の数の場合にエラーを返すか
    public function test_request_minus_number(): void
    {
        $request = ['n' => '-1'];

        $response = $this->get(route('fib', $request));

        $response->assertStatus(400);

        $this->assertEquals($response['status'], 400);
        $this->assertEquals($response['message'], 'Bad request');
    }
}
