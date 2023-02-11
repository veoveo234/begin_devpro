<?
    include "models/ModelSearch.php";
	include "models/ModelProducts.php";
    class ControllerSearch extends Controller 
    {
        use ModelSearch,ModelProducts;
		
        public function ajaxSearch()
        {
            $data = $this->modelAjaxSearch();
            $strResult  = "";
            foreach($data as $item){
				$name2=$this->removeUnicode($item->name);
                $strResult = $strResult."<li><img src='assets/upload/products/{$item->photo}'><a href='san-pham/chi-tiet/{$item->id}/{$name2}.html'>{$item->name}</a> </li>";
            }
            echo $strResult;
        }
        
		public function index(){
            
            $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;

			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 9;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ViewSearch.php",array("data"=>$data,"numPage"=>$numPage,"fromPrice"=>$fromPrice,"toPrice"=>$toPrice));
		}
        public function searchViaCategoryPrice()
        {
            $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 9;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecordCatogory()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelSearchCategory($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ViewSearchCategory.php",array("data"=>$data,"numPage"=>$numPage,"fromPrice"=>$fromPrice,"toPrice"=>$toPrice,"category_id"=>$category_id));
        }
        public function searchNameProduct()
        {
            $key = isset($_GET["like"]) ? $_GET["like"] :"";
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 9;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecordNameProduct()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelSearchNameProduct($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ViewSearchNameProduct.php",array("data"=>$data,"numPage"=>$numPage,"key"=>$key));
        }
    }
    
?>