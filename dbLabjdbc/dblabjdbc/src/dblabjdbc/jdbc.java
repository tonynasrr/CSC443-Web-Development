package dblabjdbc;
//import java.sql.*;
import java.sql.*;
import java.util.Date;
import java.util.*;
import java.util.regex.Pattern;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;

import java.text.ParseException;
import java.text.SimpleDateFormat;

public class jdbc {
	Scanner scanInt = new Scanner(System.in);
	static Scanner scan = new Scanner(System.in);
	private static boolean logedIn=false;
	public static int scanAndValidateInt()
	{ 

		int input =0;
		while (input == 0) {
			try {
				input = scan.nextInt();
				
				
			}
			catch (InputMismatchException e){
				System.out.println("INVALID INPUT \nEnter again: ");		
				scan.nextLine();
			}	
		}
		return input;
	}

	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void insert(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		System.out.println("Enter your name:");
		String name = scan.next();
		System.out.println("Enter your email");
		System.out.println("how you doinnn?");
		String username = scan.next();
		System.out.println(validate(username));

		if(!validate(username)){
			menu();
			return;
		}
		System.out.println("Enter your department");
		String dep = scan.next();
		System.out.println("Enter your salary");
		int salary = scan.nextInt();
		if(salary<0){
			menu();
			return;
		}
		sql = "Select * from employees where email = '" + username + "'";
		try {
			rs = stmt.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		try {
			if(rs.next())
			{
				System.out.println("User already exists");
			}
			else
			{
				sql = "Insert into employees(name,email,department,salary) values ('"+name +"','"+username+"','"+dep+"','"+salary+"')";
				stmt.executeUpdate(sql);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

	}
	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void delete(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}


		System.out.println("Enter email");
		String email = scan.next();
		if(!validate(email)){
			menu();
			return;
		}
		sql = "Select email from employees where email = '" + email + "'";
		try {
			rs = stmt.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		try {
			if(!rs.next())
			{
				System.out.println("User does not exist");
			}
			else
			{
				sql = "DELETE FROM employees WHERE email='" + email + "'";
				stmt.executeUpdate(sql);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}


	}
	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void update(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}



		System.out.println("Enter email");
		String em = scan.next();
		if(!validate(em)){
			menu();
			return;
		}
		sql = "Select * from employees where email = '" + em + "'";
		try {
			rs = stmt.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		try {
			if(!rs.next())
			{
				System.out.println("User does not exist");
			}
			else
			{

				System.out.println("Enter new name");
				String newname = scan.next();

				System.out.println("Enter new department");
				String newdep = scan.next();

				System.out.println("Enter new salary");
				int newsal = scan.nextInt();
				if(newsal<0){
					menu();
					return;
				}
				stmt.executeUpdate("UPDATE employees SET name = '" +newname + "', department ='" + newdep +"', salary = '" + newsal +"' WHERE email= '" + em + "'");
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}


	}
	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void listAll(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}


		try {
			rs = stmt.executeQuery("SELECT * from employees");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		ResultSetMetaData rsmd = null;
		try {
			rsmd = rs.getMetaData();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		int columnsNumber = 0;
		try {
			columnsNumber = rsmd.getColumnCount();
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			System.out.println(e1);
			System.exit(0);
		}
		try {
			while (rs.next()) {
				for (int i = 2; i <= columnsNumber; i++) {
					if (i > 2) 
						System.out.print(",  ");
					String columnValue = rs.getString(i);
					System.out.print(rsmd.getColumnName(i) + ": " + columnValue);
				}
				System.out.println("");
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
	}
	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void addAtt(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		System.out.println("Enter email");
		String emm = scan.next();
		if(!validate(emm)){
			menu();
			return;
		}
		sql = "Select * from employees where email = '" + emm + "'";
		try {
			rs = stmt.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		try {
			if(!rs.next())
			{
				System.out.println("User does not exist");
			}
			else
			{
				System.out.println("Enter date (YYYY-MM-DD) : ");
				String date = scan.next();
				if(!validDate(date)){
					menu();
					return;
				}
				System.out.println("Enter number of hours worked");
				int hrs = scan.nextInt();
				if(hrs<0){
					menu();
					return;
				}
				stmt.executeUpdate("insert into attendances(emp_email, date, hours) values('" + emm + "','" + date+"'," +hrs + ")");
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void addLeave(){

		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		System.out.println("Enter email");
		String emm = scan.next();
		if(!validate(emm)){
			menu();
			return;
		}
		sql = "Select * from employees where email = '" + emm + "'";
		try {
			rs = stmt.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		try {
			if(!rs.next())
			{
				System.out.println("User does not exist");
			}
			else
			{
				System.out.println("Enter date (YYYY-MM-DD) : ");
				String date = scan.next();
				if(!validDate(date)){
					menu();
					return;
				}
				System.out.println("Enter reason");
				scan.nextLine();

				String reason = scan.nextLine();
				System.out.println("is it payed? (y/n)");
				String payed = scan.next();
				stmt.executeUpdate("insert into abscences(emp_email, date, reason , payed) values('" + emm + "','" + date+"','" +reason + "', '"+payed+"' )");
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}
	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static boolean addmin(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		System.out.println("enter your email");
		String email=scan.next();

		System.out.println("enter your password");
		String pass=scan.next();

		try {
			rs = stmt.executeQuery("SELECT email, password from hr_employees where email= '"+email+"'");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		try {
			if(rs.next()){
				if(rs.getString("password").equals(pass)){
					logedIn=true;
					return true;
				}
				else return false;
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return false;


	}
	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void printSalary(){
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);

		}
		Statement stmt = null;
		Statement tmt = null;
		Connection con = null;
		String sql = null;
		ResultSet rs = null;
		ResultSet r = null;
		Scanner scan = new Scanner(System.in);

		try {
			con = (Connection) DriverManager.getConnection(
					"jdbc:mysql://localhost/dblabproj", 
					"root", 
					"" 
					);
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		try {
			stmt = (Statement) con.createStatement();
			tmt = (Statement) con.createStatement();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}

		String[] emails=new String[99999];
		int[] salary=new int[99999];
		int[] currSalary=new int[99999];
		try {
			rs = stmt.executeQuery("SELECT * from employees");
			r=tmt.executeQuery("select emp_email,date, hours from attendances");
			//			System.out.println(m);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		ResultSetMetaData rsmd = null;

		ResultSetMetaData smd = null;
		try {
			rsmd = rs.getMetaData();
			smd=r.getMetaData();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}
		int columnsNumber = 0;
		try {
			columnsNumber = rsmd.getColumnCount();
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			System.out.println(e1);
			System.exit(0);
		}
		try {
			int count=0;
			while (rs.next()) {
				emails[count]=rs.getString("email");
				salary[count++]=Integer.parseInt(rs.getString("salary"));
			}
			while(r.next()){
				//				System.out.println(emails.length);

				String email=r.getString("emp_email");
				int m=Calendar.getInstance().get(Calendar.MONTH)+1;

				for(int i=0;i<emails.length;i++){
					if(emails[i]!=null && Integer.parseInt(r.getString("date").split("-")[1])==m && emails[i].equals(email)){
						currSalary[i]+=Integer.parseInt(r.getString("hours"));	
						//						System.out.println(currSalary[i]);

					}
				}
			}
			for(int i=0;i<count;i++){
				System.out.println("email: "+emails[i]+" , current salary: "+(currSalary[i]*salary[i]));
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.out.println(e);
			System.exit(0);
		}






	}

	//	#######################################
	//	############HELLO CHARBEL##############
	//	#######################################
	public static void menu(){

		while(true){

			while(logedIn==false && !addmin());


			System.out.println("1.Insert\n"
					+ "2.Delete\n"
					+ "3.Update\n"
					+ "4.List all\n"
					+ "5.add attendance\n"
					+ "6.add leave\n"
					+ "7.print salary\n"
					+ "8.Exit\n"
					+ "----------------------\n"
					+ "Enter your choice: ");
			int option = scanAndValidateInt();
			while (option<1 | option>7)
			{
				System.out.println("INVALID INPUT \nEnter again");
				option = scanAndValidateInt();
			}


			switch (option) {
			case 1:insert();break;

			case 2:delete();break;

			case 3:update();break;

			case 4:listAll();break;

			case 5:addAtt(); break;

			case 6: addLeave();break;

			case 7: printSalary(); break;

			case 8:System.exit(0);
			break;




			}

		}
	}

	public static boolean validate(String email)
	{
		int at=email.indexOf('@');
		int dot=email.indexOf(('.'));
		int size=email.length();
		if(at!=-1 && dot!=-1 && size>6 && email.substring(email.length()-3,email.length()).equals("com") && at<dot ){
			return true;
		}
		return false;

		//		String emailRegex = "^[a-zA-Z0-9_+&*-]+(?:\\."+ 
		//                "[a-zA-Z0-9_+&-]+)@" + 
		//                "(?:[a-zA-Z0-9-]+\\.)+[a-z" + 
		//                "A-Z]{2,7}$"; 
		//                  
		//		Pattern pat = Pattern.compile(emailRegex); 
		//		if (email == null) 
		//		return false; 
		//		System.out.println("helllloooooo");
		//		return pat.matcher(email).matches(); 
	}

	public static boolean validDate(String strDate)
	{
		if (strDate.trim().equals(""))
		{
			return false;
		}
		else
		{
			SimpleDateFormat sdfrmt = new SimpleDateFormat("yyyy-MM-dd");
			sdfrmt.setLenient(false);
			try
			{
				Date javaDate =  (Date) sdfrmt.parse(strDate); 
			}
			catch (ParseException e)
			{
				return false;
			}
			String[] d=strDate.split("-");
			if(Calendar.getInstance().get(Calendar.MONTH)+1==Integer.parseInt(d[1]) && Calendar.getInstance().get(Calendar.YEAR)==Integer.parseInt(d[0]) && Calendar.getInstance().get(Calendar.DAY_OF_MONTH)==Integer.parseInt(d[2]) ){
			
				return true;
			}
			return false;
		}
	}




	public static void main(String[] args) 
	{
		menu();
	}

}




//----------------------------



