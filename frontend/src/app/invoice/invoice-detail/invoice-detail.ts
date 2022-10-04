import {Product} from "../../product/product";

export interface InvoiceDetail {
  id: number;
  invoice_id: number;
  product_id: number;
  quantity: number;
  created_at: string;
  updated_at: string;
  product: Product;
}
