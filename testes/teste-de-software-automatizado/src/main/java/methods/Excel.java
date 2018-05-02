package methods;
import junit.framework.Assert;

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
		/*Metodo pullData irá puxar dados de uma célula da planilha de testes para atribuir nos 
		 * campos do caso de teste.*/
		String filePath = "data//cases.xlsx";
		int indice = 0;
		FileInputStream file = new FileInputStream(new File(filePath));
		XSSFWorkbook wb = new XSSFWorkbook(file);
		XSSFSheet planilha =  wb.getSheet(plano);
		Iterator<Row> l1 = planilha.iterator();
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
			//Alteração aqui
			wb.close();
			return celulas.getStringCellValue();			
			
		}catch (Exception e) {
			System.out.println(e);
		}
		file.close();
		return "Erro na leitura";
	}
	public static void pushData1(String plano, String result, String res) throws IOException {
		/*Método para salvar dados dentro da planilha de testes*/
	
		String filePath = "data//cases.xlsx";
        FileInputStream file = new FileInputStream(new File(filePath));
        XSSFWorkbook wb = new XSSFWorkbook(file); 
        XSSFSheet linhas = wb.getSheet(plano);
        int indice = 0;
		Iterator<Row> l1 = linhas.iterator();
		
		while(l1.hasNext()) {
			Row l2 = l1.next();
			Iterator<Cell> c1 = l2.iterator();
 			while(c1.hasNext()) {
 				Cell ce = c1.next();
 				if(ce.getStringCellValue().equals(res)) {
 					indice=ce.getColumnIndex();
 					break;
 				}
 			}
		}
		  Cell cell = null;
	      cell = linhas.getRow(1).getCell(indice);
	      cell.setCellValue(result);
	      file.close();
	      FileOutputStream output_file =new FileOutputStream(new File(filePath));
	      wb.write(output_file);
	      //Alteração aqui
	      wb.close();
	      output_file.close(); 
}
	public static void toCompare(String output, String plano) throws IOException {
		/*Método que salva o resultado retornado pelo caso de testes e compara com o resultado esperado na planilha
		 * de testes, salvando se o teste passou ou deu erro*/
		
		pushData1(plano,output, "Result");
		
		String expectedResult = pullData(plano,"Expected Result");
		
		String result = pullData(plano, "Result");
		
		if(expectedResult.equals(result)) {
			pushData1(plano,"passed", "Final Result");
		}else {
			 String resultado = null;
			 Assert.assertEquals(expectedResult, result, resultado);
			pushData1(plano,resultado, "Final Result");
		}
		
	}
}
