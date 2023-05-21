<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class CustomController extends Controller
{
    /**
     * return View blade Contain Table Of Data of custom uploaded cards where status is Pendding
     *
     * @return \Illuminate\Http\Response
     */
    public function getPenddingCustomCards()
    {
        $customcards = Custom::where('status', 'Pendding')->get();
        return view('backend.uploads.customs.index', compact('customcards'));
    }
    /**
     * return View  Of Data of custom uploaded cards where status is Selected
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelectedCustomCards()
    {
        $customcards = Custom::where('status', 'Selected')->get();
        return view('backend.uploads.customs.index', compact('customcards'));
    }
    /**
     * return View blade Contain Table Of Data of custom uploaded cards where status is Approved
     *
     * @return \Illuminate\Http\Response
     */
    public function getApprovedCustomCards()
    {
        $customcards = Custom::where('status', 'Approved')->get();
        return view('backend.uploads.customs.index_approved', compact('customcards'));
    }
    /**
     * return View blade Contain Table Of Data of custom uploaded cards where status is Rejected
     *
     * @return \Illuminate\Http\Response
     */
    public function getRejectedCustomCards()
    {
        $customcards = Custom::where('status', 'Rejected')->get();
        return view('backend.uploads.customs.index_rejected', compact('customcards'));
    }

    /**
     * This Function Do Just Export Data, it needs Assositve Array(Key => value) For Export Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export($data_array)
    {
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
    }

    /**
     * This Function check card name and select oprations and format it to call export function.
     *
     * @return \Illuminate\Http\Response
     */

    public function convertAndExport(Request $r)
    {
        try {
            for ($i = 0; $i < count($r->check); $i++) {
                $card = Custom::findOrFail($r->check[$i]);
                $card_status = $card->status;
                $card_price = $card->price;
                $user = $card->user;
                $updatedCard = $card->update(['status' => $r->status]);
                if ($card_status == 'Approved') {
                    $user->increment('balance', $card_price);
                }
                $data_item[] = Custom::findOrFail($r->check[$i]);
            }
            $data_array[] = array("Card", "Type", "User", "Link", "Email", "Path", "Transaction Number", "Value", "Daily Price", "Price", "Status");

            foreach ($data_item as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'User' => $item->user->name,
                    'Link' => $item->link,
                    'Email' => $item->email,
                    'Path' => $item->path,
                    'Transaction Number' => $item->transaction_number,
                    'Value' => $item->value,
                    'Daily Price' => $item->type->daily_price,
                    'Price' => $item->price,
                    'Status' => $item->status,
                );
            }
            $this->export($data_array);
        }
        //catch
        catch (\Throwable $th) {
            return back()->with('success', 'هناك خطأ ما');
        }
    }

    /**
     * This Function Do Export All Approved Card From Custom Table.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportApprovedCustomCard()
    {
        try {
            $customCards = Custom::where('status', 'Approved')->get();

            $data_array[] = array("Card", "Type", "User", "Link", "Email", "Path", "Transaction Number", "Value", "Daily Price", "Price", "Status");

            foreach ($customCards as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'User' => $item->user->name,
                    'Link' => $item->link,
                    'Email' => $item->email,
                    'Path' => $item->path,
                    'Transaction Number' => $item->transaction_number,
                    'Value' => $item->value,
                    'Daily Price' => $item->type->daily_price,
                    'Price' => $item->price,
                    'Status' => $item->status,
                );
            }

            $this->export($data_array);
        } catch (\Throwable $th) {
            return back()->with('success', 'هنالك خطأ ما');
        }
    }

    /**
     * This Function Do Delete Approved Card From Custom Table But It Export Data To Excel Befor Delete.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteApprovedCustomCard()
    {
        try {
            $customCards = Custom::where('status', '=', 'Approved')->get();
            $data_array[] = array("Card", "Type", "User", "Link", "Email", "Path", "Transaction Number", "Value", "Daily Price", "Price", "Status");

            foreach ($customCards as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'User' => $item->user->name,
                    'Link' => $item->link,
                    'Email' => $item->email,
                    'Path' => $item->path,
                    'Transaction Number' => $item->transaction_number,
                    'Value' => $item->value,
                    'Daily Price' => $item->type->daily_price,
                    'Price' => $item->price,
                    'Status' => $item->status,
                );
            }

            Custom::where('status', '=', 'Approved')->delete();
            $this->export($data_array);
            return back()->with('success', 'تم حذف جميع الأكواد التي حالتها "موافقة"');
        } catch (\Throwable $th) {
            return back()->with('message', 'هناك خطأ ما');
        }
    }

    /**
     * This Function Do Export All Rejected Card From Custom Table.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportRejectedCustomCard()
    {
        try {
            $customCards = Custom::where('status', 'Rejected')->get();

            $data_array[] = array("Card", "Type", "User", "Link", "Email", "Path", "Transaction Number", "Value", "Daily Price", "Price", "Status");

            foreach ($customCards as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'User' => $item->user->name,
                    'Link' => $item->link,
                    'Email' => $item->email,
                    'Path' => $item->path,
                    'Transaction Number' => $item->transaction_number,
                    'Value' => $item->value,
                    'Daily Price' => $item->type->daily_price,
                    'Price' => $item->price,
                    'Status' => $item->status,
                );
            }

            $this->export($data_array);
        } catch (\Throwable $th) {
            return back()->with('success', 'هنالك خطأ ما');
        }
    }
    /**
     * This Function Do Delete Rejected Card From Custom Table But It Export Data To Excel Befor Delete.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteRejectedCustomCard()
    {
        try {
            $customCards = Custom::where('status', '=', 'Rejected')->get();
            $data_array[] = array("Card", "Type", "User", "Link", "Email", "Path", "Transaction Number", "Value", "Daily Price", "Price", "Status");

            foreach ($customCards as $item) {
                $data_array[] = array(
                    'Card' => $item->type->card->name,
                    'Type' => $item->type->name,
                    'User' => $item->user->name,
                    'Link' => $item->link,
                    'Email' => $item->email,
                    'Path' => $item->path,
                    'Transaction Number' => $item->transaction_number,
                    'Value' => $item->value,
                    'Daily Price' => $item->type->daily_price,
                    'Price' => $item->price,
                    'Status' => $item->status,
                );
            }

            Custom::where('status', '=', 'Rejected')->delete();
            $this->export($data_array);
            return back()->with('success', 'تم حذف جميع الأكواد التي حالتها "موافقة"');
        } catch (\Throwable $th) {
            return back()->with('message', 'هناك خطأ ما');
        }
    }
}
