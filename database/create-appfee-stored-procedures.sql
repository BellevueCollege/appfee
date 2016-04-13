/*
 * AppFee, College Admissions Processor
 * Copyright (C) 2015 Bellevue College
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

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
	@POS varchar(255),
        @YRQ char(4)
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
                , YRQ
		)
	OUTPUT INSERTED.ReferenceNumber VALUES (
		  @FirstName
		, @LastName
		, @MiddleName
		, @DOB
		, @Amount
		, @POS
                , @YRQ
		)
END

GO
