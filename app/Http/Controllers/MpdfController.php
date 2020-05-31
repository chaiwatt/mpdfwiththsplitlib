<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use setasign\Fpdi\PdfParser\StreamReader;

class MpdfController extends Controller
{
    public function Generate(){
        require_once (base_path('/vendor/thsplitlib/segment.php'));
        $segment = new \Segment();

        $body = 'หาดทรายละเอียดสีขาว ตัดกับท้องฟ้าและน้ำทะเลสีครามใส คือบรรยากาศของท้องทะเลไทยในช่วงของการแพร่ระบาดไวรัสโควิด-19
        ส่งผลให้ประเทศไทยมีการประกาศพ.ร.ก.ฉุกเฉินและปิดบริการสถานที่ท่องเที่ยวทางธรรมชาติทั่วประเทศเสมือนกำลังสร้างความสมดุลของ
        ระบบนิเวศให้กลับคืนสู่ธรรมชาติอีกครั้ง';
        $words = $segment->get_segment_array($body);
        $text = implode("|",$words);
        $data = ['title' => 'DomPDF with Laravel', 'body' => $text];
        $pdf = PDF::loadView('pdf', $data);
       
        return $pdf->stream('document.pdf');
    }

    public function Edit(){
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                base_path('public/assets/fonts/'),
            ]),
            'fontdata' => $fontData + [
                'thsarabunnew' => [
                    'R'  => 'THSarabunNew.ttf',    
                    'B'  => 'THSarabunNew-Bold.ttf',       
                    'I'  => 'THSarabunNew-Italic.ttf',    
                    'BI' => 'THSarabunNew-BoldItalic.ttf' 
                ]
            ],
            'default_font' => 'thsarabunnew',
            'format' => [279, 215],
        ]);

        $fileContent = file_get_contents(asset("storage/source/certificate.pdf"),'rb');
        $pagecount = $mpdf->SetSourceFile(StreamReader::createByString($fileContent));
        $tplId = $mpdf->ImportPage($pagecount);    
        $mpdf->UseTemplate($tplId);
        
        $mpdf->WriteFixedPosHTML('<h1>บริษัท เอ็นพีซีโซลูชั่นแอนด์เซอร์วิส จำกัด</h1>', 97, 115, 150, 90, 'auto');
        $mpdf->WriteFixedPosHTML('<h2>นายชัยวัฒน์ ทวีจันทร์</h2>', 68, 177, 150, 90, 'auto');
        $mpdf->WriteFixedPosHTML('<h2>01/07/2563</h2>', 173, 177, 150, 90, 'auto');
        $mpdf->Output();
       }
}
