<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadImageTrait;
use App\Models\Landing;
use Illuminate\Http\Request;

class GusetController extends Controller
{
    use UploadImageTrait;

    /**
     * return view for update info for Guest Home Page (Just Slider).
     *
     * @return Response
     */
    public function showFirstEditPage()
    {
        $sliderImages = Landing::where('section', 'slide_image')->get();
        $video = Landing::where('section', 'slide_video')->first();
        return view('backend.interface.first', compact('sliderImages', 'video'));
    }

    /**
     * return view for update info for Guest Home Page.
     *
     * @return Response
     */
    public function showSecondEditPage()
    {
        $headSecondSection = Landing::where('section', 'head')->first();
        $itemsBodySecondSection = Landing::where('section', 'services')->get();
        $discount = Landing::where('section', 'discount')->first();
        return view('backend.interface.second', compact('headSecondSection', 'itemsBodySecondSection', 'discount'));
    }


    /**
     * Add Image To Images's Slider
     *
     * @return Response
     */
    public function addImageToSlider(Request $request)
    {
        $file = $request->hasFile('image');
        if ($file) {
            $path =  $this->uploadImage($request, 'ImagesSlider');
            Landing::create([
                'name' => $request->name,
                'description' => $request->description,
                'path' => $path,
                'section' => 'slide_image'
            ]);
            return back()->with('success', 'تم إضافة الصورة بنجاح');
        } else {
            return back()->with('success', 'لم يتم إضافة صورة بسبب خطأ ما');
        }
    }

    /**
     * Delete Image From Images's Slider
     *
     * @return Response
     */
    public function deleteImageFromSlider($id)
    {
        $image = Landing::findOrFail($id);
        $oldImage = $image->path;

        $exists = public_path().'\backend\\'.$oldImage;
        if(file_exists($exists))
        {
            unlink($exists);
            return back()->with('success', 'تم حذف الصورة  بنجاح');
        }
        $image->delete();
        return back()->with('success', '  تم حذف الصورة ');
    }

    /**
     * Update The Video From Slider
     *
     * @return Response
     */
    public function updateVideoFromSlider(Request $request)
    {
        $video = Landing::where('section','slide_video')->first();
        if($video){
            $path = $this->uploadImage($request, 'videoSlider');
            $oldVideo = $video->path;
                $video->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'path' => $path,
                ]);
            $exists = public_path().'\backend\\'.$oldVideo;
            if(file_exists($exists))
            {
                unlink($exists);
                return redirect()->route('update-items-slider')->with('success', 'تم تحديث الفيديو بنجاح');
            }
            return redirect()->route('update-items-slider')->with('success', 'لا يوجد فيديو سابق');
        }
        else
        {
            return redirect()->route('update-items-slider')->with('success','لم يتم تحديث الفيديو');
        }
    }

    /**
     * Update Data From Head Of Second Section
     *
     * @return Response
     */
    public function updateHeadOfSecondSection(Request $request)
    {
        $title = Landing::where('section', 'head')->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back();
    }

    /**
     * Update Data From Body Of Second Section
     *
     * @return Response
     */
    public function updateBodyOfSecondSection(Request $request)
    {
        Landing::create([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $request->icon,
            'path' => $request->number,
            'section' => 'services'
        ]);
        return back()->with('success', 'تم اضافة أيقونة خدمات الى واجهة الموقع');
    }

    /**
     * Delete Body Of Second Section.
     *
     * @return Response
     */
    public function deleteBodyOfSecondSection($id)
    {
        try{
            $item = Landing::findOrFail($id);
            $item->delete();
            return back()->with('success', 'تم الحذف بنجاح');
        }catch (\Throwable $th) {
            return back()->with('success', 'لم يتم الحذف ');
        }
    }

    /**
     * Update Discount Section.
     *
     * @return Response
     */
    public function updateDiscountSection(Request $request)
    {
        $old_discount = Landing::where('section', 'discount')->first();

        if($old_discount){
            $path = $this->uploadImage($request, 'discountImage');
            $oldImage = $old_discount->path;
                $old_discount->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'path' => $path,
                ]);
            $exists = public_path().'\backend\\'.$oldImage;
            if(file_exists($exists))
            {
                unlink($exists);
                return back()->with('success', 'تم تحديث معلومات القسم الثالث بنجاح');
            }
            return back()->with('success', 'تأكد إن تم الامر بشكل صحيح');
        }
    }
}
