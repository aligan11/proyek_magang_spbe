<?php

namespace App\Mail;

use App\Models\Layanan_spbe;
use App\Models\Tindak_lanjut_layanan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TindakLanjutNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $tindakLanjut;
    public $pimpinan;
    public $petugas;

    /**
     * Create a new message instance.
     */
    public function __construct(Layanan_spbe $ticket, Tindak_lanjut_layanan $tindakLanjut, User $pimpinan)
    {
        $this->ticket = $ticket;
        $this->tindakLanjut = $tindakLanjut;
        $this->pimpinan = $pimpinan;
        $this->petugas = User::whereIn('id', $tindakLanjut->id_petugas)->get();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Permohonan Layanan No. ' . $this->ticket->noreg . ' Telah Diumumkan',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.tindak-lanjut',
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
