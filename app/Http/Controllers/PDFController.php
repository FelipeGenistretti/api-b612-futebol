<?php
namespace App\Http\Controllers;

use App\Jobs\SendTimePdfEmailJob;
use App\Factories\MakeGerarPdfService;
use App\Factories\MakeGerarPdfTimeService;
use App\Models\Time;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function gerarPDF()
    {
        try {
            $gerarPdfService = MakeGerarPdfService::make();
            $pdf = $gerarPdfService->execute();
            return $pdf->stream('relatorio.pdf');
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function gerarPDFTime(int $id)
    {
        try {
            $service = MakeGerarPdfTimeService::make();
            $pdf = $service->execute($id);

            return $pdf->stream("relatorio_time_{$id}.pdf");

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function enviarPdfPorEmail(int $id, string $email)
    {
        SendTimePdfEmailJob::dispatch($id, $email);

        return response()->json([
            'message' => "O envio do PDF do time {$id} para {$email} foi enfileirado."
        ]);
    }


}
