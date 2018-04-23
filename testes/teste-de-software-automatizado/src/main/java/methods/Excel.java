package methods;


import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.Iterator;

import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;



public class Excel {
	
	public static String pullData(String plano,String local) throws IOException {
		String filePath = "data//cases.xlsx";
		int indice = 0;
		//Abre o arquivo xlsx
		FileInputStream file = new FileInputStream(new File(filePath));
		XSSFWorkbook wb = new XSSFWorkbook(file);
		//Abre a aba do teste
		XSSFSheet planilha =  wb.getSheet(plano);
		//Pega a linha
		Iterator<Row> l1 = planilha.iterator();
		//Acha a celula
		while(l1.hasNext()) {
			Row l2 = l1.next();
			Iterator<Cell> c1 = l2.iterator();
 			while(c1.hasNext()) {
 				Cell ce = c1.next();
 				if(ce.getStringCellValue().equals(local)) {
 					indice=ce.getColumnIndex();
 					break;
 				}
 			}
		}

		try {
			Row linhas =  planilha.getRow(1);
			Cell celulas  = linhas.getCell(indice);
			celulas.getStringCellValue();			
			file.close();
			return celulas.getStringCellValue();			
			
		}catch (Exception e) {
			System.out.println(e);
		}
		file.close();
		return "Erro na leitura";
	}
	public static void pushData(String plano, String result) {
		
	}
	

}
