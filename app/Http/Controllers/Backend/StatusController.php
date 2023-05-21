<?php

namespace App\Http\Controllers\Backend;

use App\Models\Card;
use App\Models\Type;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\Controller;


class StatusController extends Controller
{
    /**
     * Get First Page For Pendding Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getfirstpage_pendding()
    {
        $cards = Card::all();
        return view('backend.uploads.pendding.first', compact('cards'));
    }

    /**
     * Get Second Page ( Types ) For Pendding Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getsecondpage_pendding($id)
    {
        $cards = Card::all();
        $types = Card::findOrFail($id)->types;
        return view('backend.uploads.pendding.second', compact('cards', 'types'));
    }

    /**
     * Get Third Page ( Date ) For Pendding Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPenddingCards($id)
    {
        $cards = Card::all();
        $type_selected = Type::findOrFail($id);
        $card = $type_selected->card;
        // if i had card i can in blade show his types
        $types = $card->types;
        $codes = $card->uploads->where('status', '=', 'Pendding')
                                ->where('type_id', '=', $type_selected->id);

        return view('backend.uploads.pendding.third', compact('cards', 'types', 'codes', 'type_selected'));
    }

    /**
     * Get First Page For Selected Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getfirstpage_selected()
    {
        $cards = Card::all();
        return view('backend.uploads.selected.index', compact('cards'));
    }

    /**
     * Get Second Page ( Types ) For Selected Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getsecondpage_selected($id)
    {
        $cards = Card::all();
        $types = Card::findOrFail($id)->types;
        return view('backend.uploads.selected.second', compact('cards', 'types'));
    }

    /**
     * Get Third Page ( Data ) For Selected Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelectedCards($id)
    {
        $cards = Card::all();
        $type_selected = Type::findOrFail($id);
        $card = $type_selected->card;
        // if i had card i can in blade show his types
        $types = $card->types;
        $codes = $card->uploads->where('status', '=', 'Selected')->where('type_id', '=', $type_selected->id);
        return view('backend.uploads.selected.third', compact('cards', 'types', 'codes', 'type_selected'));
    }

    /**
     * Get First Page For Approved Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getfirstpage_approved()
    {
        $cards = Card::all();
        return view('backend.uploads.approved.index', compact('cards'));
    }

    /**
     * Get Second Page ( Types ) For Approved Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getsecondpage_approved($id)
    {
        $cards = Card::all();
        $types = Card::findOrFail($id)->types;
        return view('backend.uploads.approved.second', compact('cards', 'types'));
    }

    /**
     * Get Third Page ( Data ) For Selected Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getApprovedCards($id)
    {
        $cards = Card::all();
        $type_selected = Type::findOrFail($id);
        $card = $type_selected->card;
        // if i had card i can in blade show his types
        $types = $card->types;
        $codes = $card->uploads->where('status', '=', 'Approved')->where('type_id', '=', $type_selected->id);
        return view('backend.uploads.approved.third', compact('cards', 'types', 'codes', 'type_selected'));
    }

    /**
     * Get First Page For Rejected Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getfirstpage_rejected()
    {
        $cards = Card::all();
        return view('backend.uploads.rejected.index', compact('cards'));
    }

    /**
     * Get Second Page ( Types ) For Rejected Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getsecondpage_rejected($id)
    {
        $cards = Card::all();
        $types = Card::findOrFail($id)->types;
        return view('backend.uploads.rejected.second', compact('cards', 'types'));
    }

    /**
     * Get Third Page ( Data ) For Rejected Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRejectedCards($id)
    {
        $cards = Card::all();
        $type_selected = Type::findOrFail($id);
        $card = $type_selected->card;
        // if i had card i can in blade show his types
        $types = $card->types;
        $codes = $card->uploads->where('status', '=', 'Rejected')->where('type_id', '=', $type_selected->id);
        return view('backend.uploads.rejected.third', compact('cards', 'types', 'codes', 'type_selected'));
    }

    /**
     * Transform And Export Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function transformAndExport(Request $r)
    {
        try {
            for ($i = 0; $i < count($r->check); $i++) {

                $card = Upload::findOrFail($r->check[$i]);
                $updatedCard = $card->update(['status' => $r->status]);

                $card_status = $card->status;
                $card_price = $card->price;
                $User = $card->user;

                if($card_status == 'Approved')
                {
                    $User->increment('balance', $card_price);
                }

                $data_item[] = Upload::findOrFail($r->check[$i]);
            }
            $data_array[] = array("Card", "Type", "Value", "Price", "Custom","Status");

            foreach ($data_item as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'Value' => $item->value,
                    'Price' => $item->price,
                    'Custom' => $item->custom,
                    'Status' => $item->status,
                );
            }
            ini_set('max_execution_time', 0);
            ini_set('memory_limit', '4000M');
            try {
                $spreadSheet = new Spreadsheet();
                $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
                $spreadSheet->getActiveSheet()->fromArray($data_array);
                $Excel_writer = new Xls($spreadSheet);
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
                header('Cache-Control: max-age=0');
                ob_end_clean();
                $Excel_writer->save('php://output');
                exit();

                // return back()->with('success', 'تم تغيير حالة الأكواد بنجاح وتم تنزيل ملف إكسل يحوي الاكواد التي تم تحديث حالتها.');
            } catch (Exception $e) {
                return back('success', 'هنالك خطأ ما');
            }
        } catch (\Throwable $th) {
            return back()->with('message', 'هناك خطأ ما');
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Get First Page For Pendding Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    // Just Export Approved Cards For Deleting
    public function ExportApproved(Type $type_selected)
    {
        $data_item = Upload::where('type_id', '=', $type_selected->id)
            ->where('status', '=', 'Approved')
            ->get();
        try {

            $data_array[] = array("Card", "Type", "Value", "Price", "Status", "Created_at", "Updated_at");

            foreach ($data_item as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'Value' => $item->value,
                    'Price' => $item->price,
                    'Status' => $item->status,
                    'Created_at' => $item->created_at,
                    'Updated_at' => $item->updated_at,
                );
            }
            ini_set('max_execution_time', 0);
            ini_set('memory_limit', '4000M');
            try {
                $spreadSheet = new Spreadsheet();
                $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
                $spreadSheet->getActiveSheet()->fromArray($data_array);
                $Excel_writer = new Xls($spreadSheet);
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
                header('Cache-Control: max-age=0');
                ob_end_clean();
                $Excel_writer->save('php://output');
                exit();

                // return back()->with('success', 'تم تغيير حالة الأكواد بنجاح وتم تنزيل ملف إكسل يحوي الاكواد التي تم تحديث حالتها.');
            } catch (Exception $e) {
                return back('success', 'هنالك خطأ ما');
            }
        } catch (\Throwable $th) {
            return back()->with('message', 'هناك خطأ ما');
        }
    }

    /**
     * Get First Page For Pendding Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function DeleteApproved(Type $type_selected)
    {
        try {
            $data_item = Upload::where('type_id', '=', $type_selected->id)
                ->where('status', '=', 'Approved')
                ->delete();
            return back()->with('success', 'تم حذف جميع الأكواد التي حالتها "موافقة"');
        } catch (\Throwable $th) {
            return back()->with('message', 'هناك خطأ ما');
        }
    }

    /**
     * Get First Page For Pendding Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    // Just Export Rejected Cards For Deleting
    public function ExportRejected(Type $type_selected)
    {
        $data_item = Upload::where('type_id', '=', $type_selected->id)
            ->where('status', '=', 'Rejected')
            ->get();
        try {

            $data_array[] = array("Card", "Type", "Value", "Price", "Status", "Created_at", "Updated_at");

            foreach ($data_item as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'Value' => $item->value,
                    'Price' => $item->price,
                    'Status' => $item->status,
                    'Created_at' => $item->created_at,
                    'Updated_at' => $item->updated_at,
                );
            }
            ini_set('max_execution_time', 0);
            ini_set('memory_limit', '4000M');
            try {
                $spreadSheet = new Spreadsheet();
                $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
                $spreadSheet->getActiveSheet()->fromArray($data_array);
                $Excel_writer = new Xls($spreadSheet);
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
                header('Cache-Control: max-age=0');
                ob_end_clean();
                $Excel_writer->save('php://output');
                exit();

                // return back()->with('success', 'تم تغيير حالة الأكواد بنجاح وتم تنزيل ملف إكسل يحوي الاكواد التي تم تحديث حالتها.');
            } catch (Exception $e) {
                return back('success', 'هنالك خطأ ما');
            }
        } catch (\Throwable $th) {
            return back()->with('message', 'هناك خطأ ما');
        }
    }

        /**
     * Get First Page For Pendding Uploaded Cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function DeleteRejected(Type $type_selected)
    {
        try {
            $data_item = Upload::where('type_id', '=', $type_selected->id)
                ->where('status', '=', 'Rejected')
                ->delete();
            return back()->with('success', 'تم حذف جميع الأكواد التي حالتها "مرفوضة"');
        } catch (\Throwable $th) {
            return back()->with('message', 'هناك خطأ ما');
        }
    }

}
