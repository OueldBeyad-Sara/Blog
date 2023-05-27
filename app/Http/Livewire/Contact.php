<?php

// Contact.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;

class Contact extends Component
{
    public $name, $email, $subject, $message;

    public function addContact()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new ContactMessage();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->subject = $this->subject;
        $contact->message = $this->message; // Fix the assignment here
        $saved = $contact->save();

        if ($saved) {
            $this->showToastr('Your message was successfully sent.', 'success');
            $this->name = $this->email = $this->subject = $this->message = null;
        } else {
            $this->showToastr('Something went wrong.', 'error');
        }
    }

    public function showToastr($message, $type)
    {
        $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        $contacts = ContactMessage::all();

        return view('livewire.contact', compact('contacts'));
    }
}

