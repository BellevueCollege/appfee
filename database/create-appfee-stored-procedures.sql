USE [ODS]
GO

/****** Object:  StoredProcedure [dbo].[usp_WebAppFee]    Script Date: 04/06/2015 09:25:49 ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[usp_WebAppFee]') AND type in (N'P', N'PC'))
DROP PROCEDURE [dbo].[usp_WebAppFee]
GO

USE [ODS]
GO

/****** Object:  StoredProcedure [dbo].[usp_WebAppFee]    Script Date: 04/06/2015 09:25:49 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

/****************************************************************************************************************************************************
CREATED:
03/26/2015   Smruthi Madhugiri    This stored procedure is created to capture student data from the General Admission application.

****************************************************************************************************************************************************/
CREATE PROCEDURE [dbo].[usp_WebAppFee]
	@FirstName varchar(32),
	@LastName varchar(32),
	@MiddleName varchar(16),
	@DOB datetime,
	@Amount decimal(10,2),
	@POS varchar(255)

AS
BEGIN

	SET NOCOUNT ON;


	INSERT INTO dbo.BCAdmission (
	      FirstName
		, LastName
		, MiddleName
		, DOB
		, Amount
		, ProgramofStudy
		)
	OUTPUT INSERTED.ReferenceNumber VALUES (
		  @FirstName
		, @LastName
		, @MiddleName
		, @DOB
		, @Amount
		, @POS
		)
END

GO
