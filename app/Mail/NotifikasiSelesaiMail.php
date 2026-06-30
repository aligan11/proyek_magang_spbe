<?php

namespace App\Mail;

use App\Models\Layanan_spbe;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifikasiSelesaiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    public $petugas;

    /**
     * Create a new message instance.
     */
    public function __construct(Layanan_spbe $task, User $petugas)
    {
        $this->task = $task;
        $this->petugas = $petugas;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi: Permohonan Layanan SPBE No. ' . $this->task->noreg . ' Telah Selesai!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notifikasi_selesai',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
