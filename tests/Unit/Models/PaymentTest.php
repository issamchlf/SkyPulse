<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;


    public function testIt_has_required_attributes()
    {
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create(['user_id' => $user->id]);
        
        $payment = Payment::create([
            'user_id' => $user->id,
            'reservation_id' => $reservation->id,
            'amount' => 100.00,
            'payment_method' => 'credit_card',
            'status' => 'pending'
        ]);

        $this->assertEquals($user->id, $payment->user_id);
        $this->assertEquals($reservation->id, $payment->reservation_id);
        $this->assertEquals(100.00, $payment->amount);
        $this->assertEquals('credit_card', $payment->payment_method);
        $this->assertEquals('pending', $payment->status);
    }


    public function testIt_can_be_created_with_valid_data()
    {
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create(['user_id' => $user->id]);
        
        $payment = Payment::create([
            'user_id' => $user->id,
            'reservation_id' => $reservation->id,
            'amount' => 150.50,
            'payment_method' => 'paypal',
            'status' => 'completed'
        ]);

        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'user_id' => $user->id,
            'reservation_id' => $reservation->id,
            'amount' => 150.50,
            'payment_method' => 'paypal',
            'status' => 'completed'
        ]);
    }


    public function testIt_can_update_its_attributes()
    {
        $payment = Payment::factory()->create([
            'status' => 'pending'
        ]);

        $payment->update([
            'status' => 'completed'
        ]);

        $this->assertEquals('completed', $payment->status);
        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'status' => 'completed'
        ]);
    }


    public function testIt_can_be_deleted()
    {
        $payment = Payment::factory()->create();

        $payment->delete();

        $this->assertDatabaseMissing('payments', [
            'id' => $payment->id
        ]);
    }


    public function testIt_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $payment = Payment::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $payment->User);
        $this->assertEquals($user->id, $payment->User->id);
    }


    public function testIt_belongs_to_a_reservation()
    {
        $reservation = Reservation::factory()->create();
        $payment = Payment::factory()->create(['reservation_id' => $reservation->id]);

        $this->assertInstanceOf(Reservation::class, $payment->Reservation);
        $this->assertEquals($reservation->id, $payment->Reservation->id);
    }


    public function testIt_can_have_different_statuses()
    {
        $statuses = ['pending', 'completed', 'failed'];
        
        foreach ($statuses as $status) {
            $payment = Payment::factory()->create(['status' => $status]);
            $this->assertEquals($status, $payment->status);
        }
    }


    public function testIt_can_have_different_payment_methods()
    {
        $methods = ['credit_card', 'paypal', 'bank_transfer'];
        
        foreach ($methods as $method) {
            $payment = Payment::factory()->create(['payment_method' => $method]);
            $this->assertEquals($method, $payment->payment_method);
        }
    }


    public function testIt_can_have_different_amounts()
    {
        $amounts = [10.00, 100.00, 1000.00];
        
        foreach ($amounts as $amount) {
            $payment = Payment::factory()->create(['amount' => $amount]);
            $this->assertEquals($amount, $payment->amount);
        }
    }
} 