<?php
namespace App\Http\Controllers;

use App\Factories\MakeEnviarPdfPorEmailService;
use App\Jobs\SendTimePdfEmailJob;
use App\Factories\MakeGerarPdfService;
use App\Factories\MakeGerarPdfTimeService;

use App\Models\Time;
use Illuminate\Support\Facades\Auth;

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
     public function enviarPdfPorEmail($time_id)
    {
        try {
            $service = MakeEnviarPdfPorEmailService::make();
            $service->execute($time_id);

            return response()->json([
                'message' => "O envio do PDF do time ID {$time_id} foi enfileirado."
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }


}
