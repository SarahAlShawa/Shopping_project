<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\comment;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;;
use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Session;
class ExampleTest extends TestCase
{
    public function testUserRegistration()
    {
        $password = 'password123';

        $userData = [
            'name' => 'farah',
            'email' => 'farah@farah.com',
            'password' => $password,
            'password_confirmation' => $password,
        ];
        $response = $this->post('/register', $userData);

        $response->assertRedirect();

        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
    }

    public function testUserLogin(){
        $password = 'password123';

        $userData = [
            'name' => 'farah',
            'email' => 'farah@farah.com',
            'password' => $password,
            'password_confirmation' => $password,
        ];
        $response = $this->post('/register', $userData);

        $response->assertRedirect();
         $response = $this->post('/login', [
            'email' => $userData["email"],
            'password' => $userData["password"],
        ]);

        $response->assertRedirect();
    }

    public function testAddProductToCart()
    {
        $product = product::factory()->create([
            'name' => 'Fancy Dress 1',
            'image' => 'storage/uploads/product2.png',
            'price' => 200
        ]);

        $this->post('/cart/store', ['product_id' => $product->id]);

        $this->assertTrue(Session::has('cart'));
        $cart = collect(Session::get('cart'));
        $this->assertTrue($cart->contains('id', $product->id));
    }
    public function testRemoveProductFromCart()
    {
         $product = product::factory()->create([
            'name' => 'Fancy Dress 1',
            'image' => 'storage/uploads/product2.png',
            'price' => 200
        ]);

        $this->post('/cart/store', ['product_id' => $product->id]);

        $this->assertTrue(Session::has('cart'));
        $cart = collect(Session::get('cart'));
        $this->assertTrue($cart->contains('id', $product->id));
        $this->delete('/cart/destroy', ['product_id' => $product->id]);
        $this->assertTrue(Session::has('cart'));
        $cart = Session::get('cart');
        $this->assertFalse(isset($cart[$product->id]));
    }

    public function testCartInfo()
    {
        $product1 = Product::factory()->create([
            'name' => 'Fancy Dress 1',
            'image' => 'storage/uploads/product1.png',
            'price' => 200
        ]);

        $product2 = Product::factory()->create([
            'name' => 'Fancy Dress 2',
            'image' => 'storage/uploads/product2.png',
            'price' => 150
        ]);

        $this->post('/cart/store', ['product_id' => $product1->id]);
        $this->post('/cart/store', ['product_id' => $product2->id]);
        $response = $this->get('/cart/info');

        $response->assertStatus(200);
        $responseContent = $response->getContent();
        dump($responseContent);
        $response->assertJson([
            'totalCount' => 2,
            'totalPrice' => 350
        ]);
    }
    public function testGetAllCommentsWithUserDataForProduct()
    {
        $user = User::factory()->create();
        $comment1 = comment::factory()->create([
            'user_id' => $user->id,
            'comment' => 'First comment'
        ]);

        $comment2 = Comment::factory()->create([
            'user_id' => $user->id,
            'comment' => 'Second comment'
        ]);
        $response = $this->get('/comment');
        $response->assertStatus(200);
        $response->assertSeeText($comment1->comment);
        $response->assertSeeText($comment2->comment);
    }
}
