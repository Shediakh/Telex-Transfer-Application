## Features

- **Role-Based Access Control**: 
  - **Branch Users**: Submit transfer requests, upload supporting documents, and specify transfer details (currency, number of payments).
  - **Operations Users**: Add Customer Identification Numbers (CIF), confirm transfer details, and approve or reject requests.
- **Document Management**: Upload, store, and link documents to specific transfers.
- **Payment Sequences**: Track multiple payments under a single transfer using unique IDs.
- **Audit Trail**: Logs user activities and transfer statuses for security and compliance.

## Technologies Used

- **Frontend**:
  - HTML, CSS, JavaScript
  - Figma designs for UI prototyping
- **Backend**:
  - PHP
  - MySQL for database management
- **Database Tables**:
  - `Users`: Handles authentication and role management.
  - `Documents`: Stores metadata about uploaded transfer documents.
  - `Transfers`: Tracks individual transfer details and sequences.

## Workflow

1. **Submission**:
   - Branch users upload transfer details and documents.
   - Transfer requests are recorded with unique IDs and sequences.
2. **Processing**:
   - Operations users add CIF, confirm currency, and specify amounts.
   - Transfer requests are reviewed and either registered or rejected.
3. **Management**:
   - All users can view a list of transfers, with branch users having read-only access.

## Setup and Installation

1. **Database Configuration**:
   - Update `connectdb.php` with your MySQL credentials.
   - Import the provided SQL scripts to set up `users`, `documents`, and `transfers` tables.
2. **Server Requirements**:
   - PHP-enabled server.
   - MySQL database.
3. **Run the Application**:
   - Place all files in the server's root directory.
   - Access the application via your browser at `http://localhost`.

## Key Backend Scripts

- `connectdb.php`: Establishes database connection.
- `login.php`: Handles user authentication.
- `addUser.php`: Registers new users.
- `addDocument.php`: Manages document uploads and transfer requests.
- `processTransfer.php`: Updates transfer details during processing.

## Screenshots
- **Users**:
  
![10](https://github.com/user-attachments/assets/08fbc60f-d58d-45c7-a101-3209683146e5)
- **Transfers**:
  
![11](https://github.com/user-attachments/assets/73845e4c-5be8-405d-be83-d2fbf8bc9b8e)
- **Documents**:
  
![12](https://github.com/user-attachments/assets/34f9073d-a872-4a76-8fe6-414657b8db07)
- **Figma Designs**:
  
![13](https://github.com/user-attachments/assets/08d9826a-aa0e-40bb-a4e1-92417bad505e)
![14](https://github.com/user-attachments/assets/946e78f9-2a36-483e-929d-e8f625a84584)
![15](https://github.com/user-attachments/assets/257536ba-eb11-4810-98a1-e1e9f39476fa)
![16](https://github.com/user-attachments/assets/e6c85646-c43e-4e49-a8b3-964b847e1792)
![17](https://github.com/user-attachments/assets/8f1f7a89-b8ec-4b14-889a-59741f5ffc2e)
![18](https://github.com/user-attachments/assets/d5009618-5105-492d-880e-feb0712d1e7f)
- **Front-End**: 

![24](https://github.com/user-attachments/assets/24d716cc-53d0-4f14-af3f-86d7cd27d21f)
![23](https://github.com/user-attachments/assets/ca33710c-46e3-400d-a01e-66690a24c9f6)
![22](https://github.com/user-attachments/assets/0301e4e7-8176-4700-be8e-d48ddcf3552d)
![21](https://github.com/user-attachments/assets/eae95798-faca-4c5f-9b01-ac697a1bf78a)
![24](https://github.com/user-attachments/assets/fef95392-e6c4-4af2-8a76-b9b3221c535a)

## Future Improvements

- Implement additional security features, such as encryption for sensitive data.
- Enhance user interface for better accessibility.
- Introduce multi-language support for global users.

## License

This project is proprietary and developed as part of the Burgan Bank IT department's internship program.

