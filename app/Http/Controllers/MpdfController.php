<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class MpdfController extends Controller
{
    public function Generate(){
        require_once (base_path('/vendor/thsplitlib/segment.php'));
        $segment = new \Segment();

        $body = 'หาดทรายละเอียดสีขาว ตัดกับท้องฟ้าและน้ำทะเลสีครามใส คือบรรยากาศของท้องทะเลไทยในช่วงของการแพร่ระบาดไวรัสโควิด-19 ส่งผลให้ประเทศไทยมีการประกาศพ.ร.ก.ฉุกเฉินและปิดบริการสถานที่ท่องเที่ยวทางธรรมชาติทั่วประเทศเสมือนกำลังสร้างความสมดุลของ ระบบนิเวศให้กลับคืนสู่ธรรมชาติอีกครั้ง';
        $words = $segment->get_segment_array($body);
        $text = implode("|",$words);
        $data = ['title' => 'DomPDF with Laravel', 'body' => $text];
        $pdf = PDF::loadView('pdf', $data);
       
        return $pdf->stream('document.pdf');
        }
}
